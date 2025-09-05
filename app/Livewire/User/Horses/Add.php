<?php

namespace App\Livewire\User\Horses;

use Illuminate\View\View;
use Livewire\Component;

class Add extends Component
{

    public $step = 1;

    public function mount(): void
    {

    }

    public function nextStep(): void
    {
        $this->step++;
    }

    public function previousStep(): void
    {
        $this->step--;
    }

    public function render(): View
    {
        return view('livewire.user.horses.add');
    }
}
