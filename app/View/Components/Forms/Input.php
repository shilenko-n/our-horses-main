<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $color = 'primary',
		public string $type = 'text',
		public string $label = '',
		public string $hint = '',
		public string $error = '',
		public string|null $icon = null,
		public bool $iconRight = false,
		public string|null $size = null,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.forms.input');
	}
}
