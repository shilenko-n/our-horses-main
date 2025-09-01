<?php

namespace App\Livewire\Components\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class ProfileCard extends Component
{
    public User $user;
    public bool $isSelf;

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->isSelf = Auth::id() == $user->id;
    }

    /**
     * Подписаться на пользователя
     *
     * @return void
     */
    public function subscribe(): void
    {
        $this->user->subscribe(Auth::user());
    }

    /**
     * Отписаться от пользователя
     *
     * @return void
     */
    public function unsubscribe(): void
    {
        $this->user->unsubscribe(Auth::user());
    }

    public function render(): View
    {
        return view('livewire.components.user.profile-card');
    }
}
