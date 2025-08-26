<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonTabs extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public array $tabs = [],
		public bool $onlyTabs = false,
		public string|null $size = null,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.button-tabs');
	}
}
