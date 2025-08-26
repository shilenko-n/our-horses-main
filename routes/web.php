<?php

use Illuminate\Support\Facades\Route;

if (app()->environment() != 'production') {
	Route::get('front/{view?}', function (string $view = null) {
		$view = str_replace('/', '.', $view);

		return view('site.' . ($view ?? 'index'));
	})->where('view', '[\s\S]*');
}

Route::view('/', 'site.index');

foreach (glob(base_path("routes/site/*.php")) as $filename) {
	include $filename;
}