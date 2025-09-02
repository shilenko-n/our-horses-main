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

    public function mount(
        User $user,
        bool $isSubscribed
    ): void
    {
        $this->user = $user;
        $this->isSubscribed = $isSubscribed;
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
