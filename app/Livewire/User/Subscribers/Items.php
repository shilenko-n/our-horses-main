<?php

namespace App\Livewire\User\Subscribers;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Items extends Component
{

    public Collection $users;
    public Collection $subscribers;

    public function mount(
        Collection $users,
    ): void
    {
        $this->users = $users;
        $this->subscribers = Auth::user()->userSubscriptions;
    }

    public function render(): View
    {
        return view('livewire.user.subscribers.items');
    }
}
