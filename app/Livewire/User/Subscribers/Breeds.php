<?php

namespace App\Livewire\User\Subscribers;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Breeds extends Component
{
    public Collection $horseBreeds;

    public function mount(Collection $horseBreeds): void
    {
        $this->horseBreeds = $horseBreeds;
    }

    public function render(): View
    {
        return view('livewire.user.subscribers.breeds');
    }
}
