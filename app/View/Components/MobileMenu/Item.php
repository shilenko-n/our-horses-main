<?php

namespace App\View\Components\MobileMenu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public bool $small = false,
		public bool $active = false,
		public string|null $icon = null,
		public int|null $count = null,
		public array $items = [],
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.mobile-menu.item');
	}
}
