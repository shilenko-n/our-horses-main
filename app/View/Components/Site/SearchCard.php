<?php

namespace App\View\Components\Site;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchCard extends Component
{
	public $data;

	/**
	 * Create a new component instance.
	 *
	 * @param array $data
	 */
	public function __construct($data)
	{
//		dd($data); // Проверяем, что данные приходят
		$this->data = $data;
	}

    /**
     * Get the view / contents that represent the component.
     */
	public function render(): View|Closure|string
	{
		return view('site.components.search-card', [
			'data' => $this->data,
		]);
	}
}
