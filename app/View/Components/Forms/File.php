<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class File extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $color = 'pale',
		public string $label = '',
		public string $hint = '',
		public string $error = '',
		public bool $horizontal = false,
		public bool $mini = false,
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.forms.file');
	}
}
