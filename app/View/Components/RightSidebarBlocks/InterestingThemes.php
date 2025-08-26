<?php

namespace App\View\Components\RightSidebarBlocks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InterestingThemes extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public bool $isModal = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.right-sidebar-blocks.interesting-themes');
	}
}
