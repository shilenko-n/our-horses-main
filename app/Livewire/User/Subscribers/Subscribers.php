<?php

namespace App\Livewire\User\Subscribers;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Subscribers extends Component
{
    public Collection $users;
    public $ownSubscriptions;

    public function mount(Collection $users): void
    {
        $this->users = $users;
        $this->ownSubscriptions = Auth::user()->subscriptions;
    }

    public function render(): View
    {
        return view('livewire.user.subscribers.subscribers');
    }
}
