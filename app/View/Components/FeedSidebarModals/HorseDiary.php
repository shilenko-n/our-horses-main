<?php

namespace App\View\Components\FeedSidebarModals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HorseDiary extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.feed-sidebar-modals.horse-diary');
	}
}
