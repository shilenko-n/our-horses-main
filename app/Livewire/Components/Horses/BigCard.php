<?php

namespace App\Livewire\Components\Horses;

use App\Models\Horse;
use Illuminate\View\View;
use Livewire\Component;

class BigCard extends Component
{
    public Horse $horse;
    public bool $isGuest = true;

    public function mount(Horse $horse): void
    {
        $this->horse = $horse;
        if(auth()->check() && auth()->id() == $horse->user->id)
            $this->isGuest = false;
    }



    public function render(): View
    {
        return view('livewire.components.horses.big-card');
    }
}
