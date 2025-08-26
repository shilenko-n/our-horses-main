<?php

namespace App\View\Components\RightSidebarBlocks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarBanner extends Component
{
	public array $sources = [
		'img/assets/banners/sidebar/p.png',
		'img/assets/banners/sidebar/t.png',
		'img/assets/banners/sidebar/l.png',
		'img/assets/banners/sidebar/d.png',
	];

	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public bool $isMobile = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.right-sidebar-blocks.sidebar-banner');
	}
}
