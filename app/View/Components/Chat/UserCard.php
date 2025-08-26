<?php

namespace App\View\Components\Chat;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserCard extends Component
{
    /**
     * Create a new component instance.
     */
	public function __construct(
		public array $user,
		public string|null $message = null,
		public int|null $count = null,
		public bool $isActive = false,
		public int|null $notificationCounter = null,
	) {
		//
	}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chat.user-card');
    }
}
