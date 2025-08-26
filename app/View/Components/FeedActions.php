<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeedActions extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public bool $isAdmin = false,
		public bool $onlyFilter = false,
		public array|null $list = null,
		public string|null $modalName = null,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.feed-actions');
	}
}
