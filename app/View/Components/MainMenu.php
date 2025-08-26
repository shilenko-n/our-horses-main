<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainMenu extends Component
{
	public array $mainItems = [
		[
			'icon' => 'scroll-solid',
			'name' => 'Лента',
			 'url' => '/front/pages/feed/admin/main-feed',
		],
		[
			'icon' => 'fire-solid',
			'name' => 'Самое интересное',
			 'url' => '/front/pages/feed/admin/interesting',
		],
		[
			'icon' => 'clock-solid',
			'name' => 'Актуальные записи',
			 'url' => '/front/pages/feed/admin/actual-news',
		],
		[
			'icon' => 'book-solid',
			'name' => 'Дневники',
			 'url' => '/front/pages/feed/admin/horse-diary',
		],
		[
			'icon' => 'handshake-solid',
			'name' => 'Купить лошадь',
			'url' => '/front/pages/horses/buy',
		],
		[
			'icon' => 'horse-head-solid',
			'name' => 'Лошади',
			'url' => '/front/pages/horses/breeds',
		]
	];

	public array $myItems = [
		[
			'icon' => 'circle-solid',
			'name' => 'Изольда',
			'url' => '/front/pages/horses/view',
		],
		[
			'icon' => 'circle-solid',
			'name' => 'Офелия',
			'url' => '#',
		],
		[
			'icon' => 'horse-head-solid',
			'name' => 'Мои лошади',
			'url' => '/front/pages/horses/list',
		],
		[
			'icon' => 'writing-solid',
			'name' => 'Мой блог',
			'url' => '/front/pages/profile/user/view',
		],
	];

	public array $adminItems = [
		[
			'icon' => 'advertisement-solid',
			'name' => 'Реклама',
			'url' => '/front/pages/admin/advertisement',
		],
		[
			'icon' => 'article-solid',
			'name' => 'Статьи',
			'url' => '/front/pages/admin/article-hub',
		],
		[
			'icon' => 'books-solid',
			'name' => 'Справочники',
			'url' => '/front/pages/admin/guide',
		],
		[
			'icon' => 'cog-solid',
			'name' => 'Настройки сайта',
			'url' => '/front/pages/admin/settings',
		],
	];

	/**
	 * Create a new component instance.
	 */
	public function __construct(
		public string|null $currentItem = null,
		public bool $isAdmin = false
	) {
		foreach ($this->mainItems as &$mainItem) {
			if (!$isAdmin && mb_stripos($mainItem['url'], 'admin') !== false) {
				$mainItem['url'] = str_replace('admin', 'user', $mainItem['url']);
			}
		}

		foreach ($this->myItems as &$myItem) {
			if (!$isAdmin && mb_stripos($myItem['url'], 'admin') !== false) {
				$myItem['url'] = str_replace('admin', 'user', $myItem['url']);
			}
		}
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('site.components.main-menu');
	}
}
