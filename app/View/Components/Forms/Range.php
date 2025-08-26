<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Range extends Component
{
	public $isRange;

	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $label = '',
		public string $name,
		public array $range = [0, 1000],
		public array $default = [0],
		public float $step = 1,
		public string $units = '',
	) {
		$this->isRange = array_key_exists(1, $this->default);
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.forms.range');
	}
}
