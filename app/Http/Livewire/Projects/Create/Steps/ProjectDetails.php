<?php

namespace App\Http\Livewire\Projects\Create\Steps;

use Livewire\Component;
use Spatie\LivewireWizard\Components\StepComponent;

class ProjectDetails extends StepComponent
{
    public function render()
    {
        return view('livewire.projects.create.steps.project-details');
    }
}
