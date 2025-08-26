<?php

namespace App\View\Components\Horse;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SmallCard extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public array $horse,
		public bool $isSubscribed = false,
		public bool $hasEdit = false,
		public int|null $price = null,
		public bool $moderation = false,
		public bool $isRevision = false,
		public bool $showButton = false,
		public bool $isPositioning = false,
		public bool $hideOwner = false,
		public bool $hideBadges = false,
		public string $editUrl = '',
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.horse.small-card');
	}
}
