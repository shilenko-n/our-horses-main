<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $name,
		public int $maxScreenWidth = 0,
		public bool $disableWrapperClose = false,
		public bool $saveContent = false,
		public bool $sidebarContent = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.modal');
	}
}
