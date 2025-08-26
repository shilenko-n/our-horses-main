<?php

namespace App\View\Components\User;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MiniCard extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $username,
		public string $photo,
		public string|null $nickname = null,
		public bool $dark = true,
		public string|null $location = null
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.user.mini-card');
	}
}
