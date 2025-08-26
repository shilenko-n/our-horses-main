<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string|null $icon = null,
	) {
		//
	}

	/**
	 * Whether the component should be rendered
	 */
	public function shouldRender(): bool
	{
		return $this->icon;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.icon');
	}
}
