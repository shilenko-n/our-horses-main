<?php

namespace App\View\Components\FeedBlocks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HorseCard extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public array $horse,
		public bool $showHorseDay = false,
		public bool $showAddButton = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.feed-blocks.horse-card');
	}
}
