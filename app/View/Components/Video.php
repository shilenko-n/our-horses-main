<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Video extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $poster,
		public string|null $posterLaptop = null,
		public string|null $posterTablet = null,
		public string|null $posterPhone = null,
		public bool $disableWrapperClose = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.video');
	}
}
