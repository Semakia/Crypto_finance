<?php

namespace App\Http\Controllers;

use App\Models\CampaignDonation;
use App\Models\CampaignDonationTransaction;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class FlowerUpgradeController extends Controller
{

    public function store(Request $request)
    {
        $level = Level::find($request->level_id);
        $user = User::find(auth()->id());
        $campaign = $user->campaigns()->latest()->first();
        $latestUser = User::oldestUserWithLessMember($request->level_id)->first();
        if($user->balanceFloat < $level->level_price) {
            Flash::error('Solde insuffisant pour faire la mise à niveau vers la fleur suivante.');
            return redirect()->route('user.members');
        }
        $transactionData = [
            'transaction_id' => 'WALLET-'.$user->id,
            'amount' => $level->level_price * 0.5,
            'campaign_id' => $campaign->client_reference_id,
            'gift_id' => null,
            'payment_method' => CampaignDonationTransaction::WALLET,
            'payload' => json_encode([]),
             ];


        $campaignDonationTransaction = CampaignDonationTransaction::create($transactionData);

        $paymentData = [
            'campaign_id' => $campaign->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'user_id' => $user->id,
            'donated_amount' => $level->level_price * 0.5,
            'charge_amount' => $level->level_price * 0.5,
            'campaign_donation_transaction_id' => $campaignDonationTransaction->id,
            'donate_anonymously' => false,
            'gift_id' => null,
        ];

        $campaignDonation = CampaignDonation::create($paymentData);
        $user->members()->attach($user->id, ['level_id' => $level->id]);
        $latestUser->members()->attach($user->id, ['level_id' => $level->id, 'campaign_id' => $campaign->id]);
        $latestUser->depositFloat($level->level_price * 0.5);
        $campaign->level_id = $level->id;
        $campaign->save();
        Flash::success('Mise à niveau effectué avec succès.');
        return redirect()->route('user.members');
    }
}
