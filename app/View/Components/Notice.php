<?php

namespace App\View\Components;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Notice extends Component
{
	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string $icon,
		public Carbon $timestamp,
		public bool $isRead = false
	) {
		//
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.notice');
	}

	public function showTimestamp()
	{
		if ($this->timestamp->diffInDay() >= 2 && $this->timestamp->year != date('Y')) {
			return $this->timestamp->locale('ru_RU')->translatedFormat('d F Y в H:i');
		}

		if ($this->timestamp->diffInDay() >= 2) {
			return $this->timestamp->locale('ru_RU')->translatedFormat('d F в H:i');
		}

		if ($this->timestamp->isYesterday()) {
			return 'Вчера в ' . $this->timestamp->format('H:i');
		}

		return $this->timestamp->diffForHumans();
	}
}
