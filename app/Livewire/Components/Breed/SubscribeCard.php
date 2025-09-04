<?php

namespace App\Livewire\Components\Breed;

use App\Models\HorseBreed;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class SubscribeCard extends Component
{

    public HorseBreed $horseBreed;
    public User $user;

    public bool $showButton;

    public bool $isSubscribed;

    public function mount(
        HorseBreed $horseBreed,
        bool $showButton = false,
    ): void
    {
        $this->horseBreed = $horseBreed;
        $this->user = Auth::user();
        $this->showButton = $showButton;

        $this->isSubscribed = $this->horseBreed->isSubscribed($this->user);
    }

    public function subscribe(): void
    {
        $this->horseBreed->subscribe($this->user);
        $this->isSubscribed = true;
    }

    public function unsubscribe(): void
    {
        $this->horseBreed->unsubscribe($this->user);
        $this->isSubscribed = false;
    }

    public function render(): View
    {
        return view('livewire.components.breed.subscribe-card');
    }
}
