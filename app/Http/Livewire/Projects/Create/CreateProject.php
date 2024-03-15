<?php

namespace App\Http\Livewire\Projects\Create;

use App\Http\Livewire\Projects\Create\Steps\BasicDetails;
use App\Http\Livewire\Projects\Create\Steps\DefineGoal;
use App\Http\Livewire\Projects\Create\Steps\ProjectDetails;
use Livewire\Component;
use Spatie\LivewireWizard\Components\WizardComponent;

class CreateProject extends WizardComponent
{

    public function steps(): array {
        return [
            BasicDetails::class,
            DefineGoal::class,
            ProjectDetails::class
        ];
    }
}
