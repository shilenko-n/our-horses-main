<?php

namespace App\View\Components\User;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Owners extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public bool $isDead = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.user.owners');
	}
}
