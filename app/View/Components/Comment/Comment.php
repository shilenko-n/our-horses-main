<?php

namespace App\View\Components\Comment;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Comment extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public array $comment,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.comment.comment');
	}
}
