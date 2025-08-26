<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserStatus extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string|null $ago = null,
		public bool $isSmall = false,
		public bool $isInline = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.user-status');
	}
}
