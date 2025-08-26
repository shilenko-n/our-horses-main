<?php

namespace App\View\Components\Post;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SmallCard extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $category,
		public array $post = [],
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.post.small-card');
	}
}
