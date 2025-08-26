<?php

namespace App\Providers;

use App\View\Composers\CommentsComposer;
use App\View\Composers\ContactsComposer;
use App\View\Composers\CurrentPageComposer;
use App\View\Composers\MenuItemsComposer;
use App\View\Composers\PaginateComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('site.blocks.contacts', ContactsComposer::class);
		view()->composer('site.blocks.pagination', PaginateComposer::class);

		view()->composer('site.blocks.comments', CommentsComposer::class);

		Paginator::defaultView('site.blocks.pagination');

		Blade::anonymousComponentPath(base_path('/resources/views/components'), 'site');
	}
}
