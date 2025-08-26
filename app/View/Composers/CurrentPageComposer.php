<?php

namespace App\View\Composers;

use App\Models\MenuItem;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class CurrentPageComposer
{
	public function compose(View $view)	 {
		$page = Route::getCurrentRoute()->parameter('page');

		if(is_null($page)) {
			$page = MenuItem
				::defaultOrder()
				->published()
				->where('is_show_in_menu', true)
				->first();
		}

		if($page && $page->exists) {
			$page->load([
				'blocks' => function($query) {
					return $query->defaultOrder();
				}
			]);
		}

		$view->with('currentPage', $page);
	}
}
