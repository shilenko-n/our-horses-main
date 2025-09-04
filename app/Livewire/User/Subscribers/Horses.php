<?php

namespace App\Livewire\User\Subscribers;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Horses extends Component
{
    public Collection $horses;
    public ?User $user;

    public function mount(
        Collection $horses,
        ?User $user,
    ): void
    {
        $this->user = $user ?? Auth::user();
        $this->horses = $horses;
    }

    public function render(): View
    {
        return view('livewire.user.subscribers.horses');
    }
}
