<?php

namespace App\View\Components\Breed;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubscribeCard extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $name,
		public bool $isSubscribed = false,
		public bool $showButton = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.breed.subscribe-card');
	}
}
