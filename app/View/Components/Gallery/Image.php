<?php

namespace App\View\Components\Gallery;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string|null $big = null,
		public string|null $small = null,
	) {
		//
	}

	/**
	 * Whether the component should be rendered
	 */
	public function shouldRender(): bool
	{
		return isset($this->small);
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.gallery.image');
	}
}
