<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileLink extends Component
{
	public string $icon = '';

	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $name,
		public string $type,
		public int $size
	) {
		$this->icon = get_file_icon($type);
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.file-link');
	}
}
