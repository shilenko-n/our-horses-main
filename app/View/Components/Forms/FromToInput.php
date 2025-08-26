<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FromToInput extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $name,
		public string $type = 'text',
		public string $label = '',
		public string|null $min = null,
		public string|null $max = null,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.forms.from-to-input');
	}
}
