<?php

namespace App\View\Components\User;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileCard extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public object|array|null $user,
		public bool $isSelf = false,
		public bool $showCover = false,
		public string|null $description = null,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.user.profile-card');
	}
}
