<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;

use App\Http\Controllers\PageController;

Route::name('pages.')->group(function () {

    Route::get('/', [PageController::class, 'home'])
        ->name('home');

});

Route::get('/login/{user}', function (User $user) {
    Auth::login($user);
});


Route::get('/logout', function () {
    Auth::logout();
});




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
