<?php

namespace App\Livewire\User\Subscribers;

use App\Models\User;
use Livewire\Component;

class Subscribers extends Component
{
    public $subscribers;
    public User $user;

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->subscribers = $user->subscriptions()->with('user')->get();
    }

    public function render()
    {
        return view('livewire.user.subscribers.subscribers');
    }
}
