<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tab extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string|null $icon = null,
		public bool $isSquare = false,
		public bool $isActive = false,
		public bool $isSelected = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.tab');
	}
}
