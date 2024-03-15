<?php

namespace App\Http\Livewire\Projects\Create\Steps;

use App\Models\Campaign;
use App\Models\CampaignCategory;
use App\Models\Country;
use Livewire\Component;
use Spatie\LivewireWizard\Components\StepComponent;

class DefineGoal extends StepComponent
{
    public $campaign;
    public $currencies;
    public $campaignCategory;
    public $country;
    public $location;
    public $goal;
    public $video_link;
    public $campaign_end_method;
    public $country_id;
    public $start_date;
    public $deadline;
    public $is_featured = false;
    public $is_emergency = false;
    public function mount()
    {
        $this->campaignCategory = CampaignCategory::whereIsActive(true)->pluck('name', 'id')->toArray();
        $this->country = Country::all()->pluck('country_name', 'id')->toArray();
        $this->currencies = $this->getCurrencies();
        $campaignId = $this->state()->forStep('basic-details')['projectId'];
        $this->campaign = Campaign::find($campaignId);
    }
    public function render()
    {
        return view('livewire.projects.create.steps.define-goal');
    }
    /**
     * @return array
     */
    public function getCurrencies(): array
    {
        $currencyPath = file_get_contents(storage_path().'/currencies/defaultCurrency.json');
        $currenciesData = json_decode($currencyPath, true);
        $currencies = [];

        foreach ($currenciesData['currencies'] as $currency) {
            $convertCode = strtolower($currency['code']);
            $currencies[$convertCode] = [
                'symbol' => $currency['symbol'],
                'name' => $currency['name'],
            ];
        }

        return $currencies;
    }

    public function submit()
    {
        $this->validate([
            'goal' => 'required|integer',
            'campaign_end_method' => 'required|integer',
            'country_id' => 'required|integer',
            'start_date' => 'required',
            'deadline' => 'required|after_or_equal:start_date',
        ]);
        $campaign = Campaign::find($this->campaign->id);
        $campaign->update([
                'goal' => $this->goal,
                'campaign_end_method' => $this->campaign_end_method,
                'country_id' => $this->country_id,
                'start_date' => $this->start_date,
                'deadline' => $this->deadline,
                'is_featured' => $this->is_featured,
                'is_emergency' => $this->is_emergency,
        ]);
        return redirect()->route('user.dashboard');
    }
}
