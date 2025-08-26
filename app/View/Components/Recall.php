<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Recall extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $type = 'recall',
		public int|null $blockId = null,
		public string|null $ymGoal = null,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.recall');
	}
}
