<?php

namespace App\Livewire\Components\Horses;

use App\Models\Horse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class SmallCard extends Component
{
    public Horse $horse;
    public ?User $user;
    public bool $isSubscribed;

    public bool $isPositioning;
    public bool $isRevision;
    public bool $hideBadges;
    public bool $showButton;
    public bool $hideOwner;
    public bool $hasEdit;


    public function mount(
        Horse $horse,
        ?User $user = null,

        bool $isPositioning = false,
        bool $isRevision = false,
        bool $hideBadges = false,
        bool $showButton = false,
        bool $hideOwner = false,
        bool $hasEdit = false,
    ): void
    {
        $this->horse = $horse;
        $this->user = $user;

        if(!$this->user->id) {
            $this->user = Auth::user();
        }

        $this->isSubscribed = $horse->isSubscribed($this->user);
        $this->isPositioning = $isPositioning;
        $this->isRevision = $isRevision;
        $this->hideBadges = $hideBadges;
        $this->showButton = $showButton;
        $this->hideOwner = $hideOwner;
        $this->hasEdit = $hasEdit;
    }

    public function subscribe(): void
    {
        $this->horse->subscribe($this->user);
        $this->isSubscribed = true;
    }

    public function unsubscribe(): void
    {
        $this->horse->unsubscribe($this->user);
        $this->isSubscribed = false;
    }

    public function render(): View
    {
        return view('livewire.components.horses.small-card');
    }
}
