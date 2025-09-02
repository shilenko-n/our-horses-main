<?php

namespace App\Livewire\User\Subscribers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Items extends Component
{
    public User $user;

    public Collection $subscribers;

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->subscribers = Auth::user()->userSubscriptions;
    }

    public function render(): View
    {
        return view('livewire.user.subscribers.items');
    }
}
