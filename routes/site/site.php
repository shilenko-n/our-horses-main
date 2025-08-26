<?php

use Illuminate\Support\Facades\Route;

Route::get('sitemap.xml', 'SitemapController@show')->name('site.sitemap');

if (config('app.env') == 'local') {
	Route::view('helpers', 'site.helpers');
}

Route::get('login', function () {
	session(['auth' => true]);

	return redirect('/front/pages/profile/user/view');
})->name('site.login');

Route::get('logout', function () {
	session(['auth' => false]);

	return redirect('/front/index');
})->name('site.logout');

Route::get('{page?}', 'PageController@show')->name('site.pages');
