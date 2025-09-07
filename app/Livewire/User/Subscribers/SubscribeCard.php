<?php

namespace App\Livewire\User\Subscribers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class SubscribeCard extends Component
{
    public User $user;
    public bool $isSubscribed = false;
    public bool $isSelf = false;

    public function mount(
        User $user,
        bool $isSubscribed = false,
    ): void
    {
        $this->user = $user;
        $this->isSelf = auth()->check() && auth()->id() === $user->id;
        $this->isSubscribed = $isSubscribed;

        if(auth()->check() && !$this->isSelf) {
            $this->isSubscribed = $user->isSubscribed(auth()->user());
        }
    }

    public function toggleSubscription(): void
    {
        $this->isSubscribed = ! $this->isSubscribed;

        if($this->isSubscribed) {
            $this->user->subscribe(Auth::user());
        }else{
            $this->user->unsubscribe(Auth::user());
        }
    }

    public function render(): View
    {
        return view('livewire.user.subscribers.subscribe-card');
    }
}
