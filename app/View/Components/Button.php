<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $color = 'accent',
		public bool $link = false,
		public string|null $icon = null,
		public bool $iconRight = false,
		public string|null $size = null,
		public bool $isBlock = false,
		public bool $isNarrow = false,
		public bool $hasBorder = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.button');
	}
}
