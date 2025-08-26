<?php

namespace App\View\Components;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostControls extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public int $likes = 0,
		public int $comments = 0,
		public int $bookmarks = 0,
		public int $views = 0,
		public Carbon|null $timestamp = null,
		public bool $liked = false,
		public bool $showViews = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.post-controls');
	}
}
