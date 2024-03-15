<?php

namespace App\Http\Controllers;

use App\Mail\DonationPaymentReceivedMail;
use App\Mail\MembershipPaymentReceived;
use App\Models\Campaign;
use App\Models\CampaignDonation;
use App\Models\CampaignDonationTransaction;
use App\Models\InvestPackage;
use App\Models\Level;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Hexters\CoinPayment\CoinPayment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class MembershipController extends AppBaseController
{
    public function index()
    {
        $latestUser = User::role('user')->oldestUserWithLessMember(1)->first();
        $campaign = $latestUser->campaigns()->latest()->first();
        Session::put('campaign_id', $campaign->id);
        //session('campaign_id', $campaign->id);

        return view('front_landing.payment', compact('campaign'));
    }

    public function pay()
    {
        $Invest = InvestPackage::find(Session::get('investment_id'));
        $transaction['order_id'] = uniqid();
        $transaction['amountTotal'] = (FLOAT) $Invest['amount_required'];
        
        $transaction['buyer_name'] = auth()->user()->first_name.' '. auth()->user()->last_name;
        $transaction['buyer_email'] = auth()->user()->email;
        $transaction['redirect_url'] = url('/'); // When Transaction was comleted
        $transaction['cancel_url'] = url('/connexion');
        $transaction['items'][] = [
            'itemDescription' => 'Investissement  Crypto',
            'itemPrice' => (FLOAT) $Invest['amount_required'], // USD
            'itemQty' => (INT) 1,
            
        ];
        
        $transaction['payload'] = [
          'payment_type' => 'membership',
          'user_id' => auth()->id(),
          'investment_id' => session('investment_id'),
          'payment_status' => 'pending'
        ];
        return redirect(CoinPayment::generatelink($transaction));
    }

    public function createSession(Request $request)
    {
       
        $user = User::find($request->user_id);
        $invest = InvestPackage::find($request->campaign_id);
        setStripeApiKey();

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'customer_email' => $user->email,
            'line_items' => [
                [
                    'price_data' => [

                        'unit_amount' =>  $invest['investment_id'] * 100,
                        'currency' => 'eur',
                        'package_name' => [
                            'name' => 'Package '.$invest->title,
                            'description' => 'Inscrit au package '.$invest->title,
                        ],
                    ],
                    'quantity' => 1,

                ],
                /*[
                    'price_data' => [
                        'unit_amount' =>  $totalAmountCotisation * 100,
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'Cotisation annuelle.',
                            'description' => 'Cotisation annuelle.',
                        ],
                    ],
                    'quantity' => 1,

                ],*/
            ],
            'billing_address_collection' => 'auto',
            'client_reference_id' => $request->campaign_id,
            'metadata' => [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,

            ],
            'mode' => 'payment',
            'success_url' => route('user.membership.pay.payment-success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route("user.membership.index"),
        ]);
        $result = [
            'sessionId' => $session['id'],
        ];

        session(['campaign_id' => $request->campaignId]);

        return $this->sendResponse($result, 'Session created successfully.');
    }

    public function paymentSuccess(Request $request)
    {
        $sessionId = $request->session_id;
        $invest = InvestPackage::find($request->campaign_id);
        setStripeApiKey();
        $sessionData = \Stripe\Checkout\Session::retrieve($sessionId);
        $user = User::firstWhere('email', $sessionData->metadata->email);
        $membership = Membership::create([
            'user_id' => $user->id,
            'started_at' => now(),
            'ended_at' => now()->addYear(),
            'price' => $invest['amount_required']*100
         ]);
        


        
        $Invest = InvestPackage::find($sessionData->client_reference_id);
        $paymentData = [
            'investment_id' => $sessionData->client_reference_id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'user_id' => $user->id,
            'donated_amount' => $Invest['investment_id'],
            'donate_anonymously' => false,
            'gift_id' => null,
        ];

        //$campaignDonation = InvestPackage::create($paymentData);
        $latestUser = User::oldestUserWithLessMember(1)->first();
        $latestUserPackage = $latestUser->investments()->latest() ->first();
       
       
        $latestUser->members()->attach($user->id, ['investment_id' => $Invest->id]);
        $latestUser->depositFloat($Invest['investment_id'] * 0.5);
        
        $Invest->save();
        Mail::to($user->email)->send(new MembershipPaymentReceived($Invest));
        Flash::success('Payment successfully done.');
        return redirect()->route('user.dashboard');
    }

    public function handleFailedPayment()
    {
        Flash::error('Your Payment is Cancelled');

        return redirect(route('user.membership.index'));
    }
}
