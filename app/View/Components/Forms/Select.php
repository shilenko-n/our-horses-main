<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string|null $size = null,
		public bool $isDropdown = false,
		public string $label = '',
		public string $hint = '',
		public string $error = '',
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.forms.select');
	}
}
