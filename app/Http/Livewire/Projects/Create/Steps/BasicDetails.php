<?php

namespace App\Http\Livewire\Projects\Create\Steps;

use App\Models\Campaign;
use App\Models\CampaignCategory;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\LivewireWizard\Components\StepComponent;

class BasicDetails extends StepComponent
{
    use WithFileUploads;
    public $campaignCategory;
    public $projectId;
    public $title;
    public $slug;
    public $campaign_category_id;
    public $short_description;
    public $image;
    public $description;
    public function mount()
    {
        $this->campaignCategory = CampaignCategory::whereIsActive(true)->pluck('name', 'id')->toArray();
    }
    public function render()
    {
        return view('livewire.projects.create.steps.basic-details');
    }

    public function submit()
    {
        ray($this->state());
        $this->validate([
         'title' => 'required|unique:campaigns,title|max:50',
         'campaign_category_id' => 'required',
         'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        $this->slug = Str::slug($this->title);
        $project = Campaign::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'slug' => $this->slug,
            'campaign_category_id' => $this->campaign_category_id,
            'description' => $this->description,
            'status' => Campaign::STATUS_PENDING,
            'short_description' => $this->short_description
        ]);
        $project->addMedia($this->image)->toMediaCollection(Campaign::CAMPAIGN_IMAGE);
        $this->projectId = $project->id;
        $this->nextStep();
    }
}
