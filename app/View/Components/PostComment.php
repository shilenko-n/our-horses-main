<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostComment extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $photo,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.post-comment');
	}
}
