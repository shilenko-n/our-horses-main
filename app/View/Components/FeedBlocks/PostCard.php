<?php

namespace App\View\Components\FeedBlocks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostCard extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public $post,
		public $user = null,
		public $shadow = false,
		public $newsLine = false,
		public $showButtons = false,
		public string $alertMessage = '',
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.feed-blocks.post-card');
	}
}
