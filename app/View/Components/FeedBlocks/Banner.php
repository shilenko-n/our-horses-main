<?php

namespace App\View\Components\FeedBlocks;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Banner extends Component
{
	public array $sources = [
		'img/assets/banners/feed/p.png',
		'img/assets/banners/feed/t.png',
		'img/assets/banners/feed/l.png',
		'img/assets/banners/feed/d.png',
	];

	/**
	 * Create a new component instance.
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.feed-blocks.banner');
	}
}
