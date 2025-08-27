<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;


Route::get('/', [PageController::class, 'index']);



//if (app()->environment() != 'production') {
//	Route::get('front/{view?}', function (string $view = null) {
//		$view = str_replace('/', '.', $view);
//
//		return view('site.' . ($view ?? 'index'));
//	})->where('view', '[\s\S]*');
//}
//
//Route::get('/', [IndexController::class, 'index']);
//
//foreach (glob(base_path("routes/site/*.php")) as $filename) {
//	include $filename;
//}
