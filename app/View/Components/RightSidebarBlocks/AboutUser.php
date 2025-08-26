<?php

namespace App\View\Components\RightSidebarBlocks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AboutUser extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $about,
		public bool $isModal = false,
		public bool $isGuest = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.right-sidebar-blocks.about-user');
	}
}
