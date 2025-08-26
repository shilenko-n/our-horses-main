<?php

namespace App\View\Composers;

use App\Models\MenuItem;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class MenuItemsComposer
{
	public function compose(View $view) {
		$menu_items = MenuItem
			::whereIsRoot()
			->published()
			->where('is_show_in_menu', true)
			->where('is_published', true)
			->defaultOrder()
			->get();

		$view->with('menuItems', $menu_items);
	}
}
