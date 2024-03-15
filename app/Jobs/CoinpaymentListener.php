<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\Mail\MembershipPaymentReceived;
use App\Mail\DonationPaymentReceivedMail;
use App\Models\Campaign;
use App\Models\CampaignDonation;
use App\Models\CampaignDonationTransaction;
use App\Models\Level;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use DB;
use Exception;
use Hexters\CoinPayment\Entities\CoinpaymentTransaction;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class CoinpaymentListener implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $transaction;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        /**
         * Handle your transaction here
         * the parameter is :
         *
         * address
         * amount
         * amountf
         * coin
         * confirms_needed
         * payment_address
         * qrcode_url
         * received
         * receivedf
         * recv_confirms
         * status
         * status_text
         * status_url
         * timeout
         * txn_id
         * type
         * payload
         * transaction_type --> value: new | old
         *
         * ----------------- PAYMENT STATUS -------------------
         * 0   : Waiting for buyer funds
         * 1   : Funds received and confirmed, sending to you shortly
         * 100 : Complete,
         * -1  : Cancelled / Timed Out
         *
         * ----------------------------------------------------
         *  You can use transaction_type to distinguish new transactions or old transactions
         * ----------------------------------------------------
         * Example
         *  $this->transaction['transaction_type']
         *  // out: new / old
         */
        if($this->transaction['status'] == 100 && $this->transaction['payload']['payment_type'] == 'membership' && $this->transaction['payload']['payment_status'] != 'completed') {

            $membership = Membership::create([
                    'user_id' => $this->transaction['payload']['user_id'],
                    'started_at' => now(),
                    'ended_at' => now()->addYear(),
                    'price' => 25.00
                 ]);
            $transactionData = [
               'transaction_id' => $this->transaction['txn_id'],
               'amount' => 25.00 * 0.5,
               'campaign_id' => $this->transaction['payload']['campaign_id'],
               'gift_id' => null,
               'payment_method' => CampaignDonationTransaction::COINPAYMENT,
               'payload' => json_encode($this->transaction['payload']),
                ];


            $campaignDonationTransaction = CampaignDonationTransaction::create($transactionData);
            $user = User::find($this->transaction['payload']['user_id']);
            $paymentData = [
                'campaign_id' => $this->transaction['payload']['campaign_id'],
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'user_id' => $user->id,
                'donated_amount' => 25.00 * 0.5,
                'charge_amount' => 25.00 * 0.5,
                'campaign_donation_transaction_id' => $campaignDonationTransaction->id,
                'donate_anonymously' => false,
                'gift_id' => null,
            ];
            $campaign = Campaign::find($this->transaction['payload']['campaign_id']);
            $campaignDonation = CampaignDonation::create($paymentData);
            $latestUser = User::oldestUserWithLessMember(1)->first();
            $level = Level::first();
            $user->members()->attach($user->id, ['level_id' => $level->id]);
            $latestUser->members()->attach($user->id, ['level_id' => $level->id, 'campaign_id' => $campaign->id]);
            $latestUser->depositFloat(25.00 * 0.5);
            $transaction = CoinpaymentTransaction::firstWhere('txn_id', $this->transaction['txn_id']);
            $payload = $transaction->payload;
            $payload['payment_status'] = 'completed';
            $transaction->payload = $payload;
            $transaction->save();
            $campaign->level_id = $level->id;
            $campaign->save();
            Mail::to($user->email)->send(new MembershipPaymentReceived($membership));
        }
        if($this->transaction['status'] == 100 && $this->transaction['payload']['payment_type'] == 'donation') {
            $transactionData = [
                'transaction_id' => $this->transaction['txn_id'],
                'amount' => $this->transaction['amountf'],
                'campaign_id' => $this->transaction['payload']['request_data']['campaign_id'],
                'gift_id' => '',
                'payment_method' => CampaignDonationTransaction::COINPAYMENT,
                'payload' => $this->transaction['payload'],
            ];
            $user = User::firstWhere('email', $this->transaction['payload']['request_data']['email']);


            try {
                DB::beginTransaction();

                $campaignDonationTransaction = CampaignDonationTransaction::create($transactionData);
                $user = User::firstWhere('email', $this->transaction['payload']['request_data']['email']);
                $donateAnonymously = session('donate_anonymously');

                $paymentData = [
                    'campaign_id' => $this->transaction['payload']['request_data']['campaign_id'],
                    'first_name' => $this->transaction['payload']['request_data']['first_name'],
                    'last_name' => $this->transaction['payload']['request_data']['last_name'],
                    'email' => $this->transaction['payload']['request_data']['email'],
                    'user_id' => $user->id,
                    'donated_amount' => $this->transaction['payload']['request_data']['amount'],
                    'charge_amount' => $this->transaction['payload']['request_data']['amount'],
                    'campaign_donation_transaction_id' => $campaignDonationTransaction->id,
                    'donate_anonymously' => $donateAnonymously,
                    'gift_id' => '',
                ];

                $campaignDonation = CampaignDonation::create($paymentData);



                /*$commissionAmount = 0;

                $commissionPercentage = getSettingValue('donation_commission');

                if ($commissionPercentage != 0) {
                    $commissionAmount = getCommissionAmount($amount, $commissionPercentage);
                }

                $totalAmount = getTotalAmount($amount, $commissionAmount);

                $earningData = [
                    'campaign_id' => $campaignId,
                    'amount' => $totalAmount,
                    'commission_amount' => $commissionAmount,
                ];

                $earning = Earnings::create($earningData);*/
                $latestUser = User::oldestUserWithLessMember(1)->first();
                $level = Level::first();
                $user->members()->attach($user->id, ['level_id' => $level->id]);
                $user->members()->attach($latestUser->id, ['level_id' => $level->id]);
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                throw new UnprocessableEntityHttpException($e->getMessage());
            }
        }
        return 0;
    }
}
