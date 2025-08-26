<?php

namespace App\View\Components\User;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubscribeCard extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public array $user,
		public bool $isSubscribed = false,
		public string|null $message = null,
		public int|null $count = null,
		public bool $showButton = false,
		public bool $isActive = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.user.subscribe-card');
	}
}
