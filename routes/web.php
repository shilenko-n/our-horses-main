<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;

use App\Http\Controllers\PageController;

/**
 * All root routes (All main pages)
 *
 */

Route::name('pages.')->group(function () {

    Route::get('/', [PageController::class, 'home'])
        ->name('home');

    Route::name('user.')->prefix('user')->group(function () {

        Route::get('/profile', [PageController::class, 'userProfile'])
            ->name('profile');

    });

    Route::name('auth.')->prefix('auth')->group(function () {

        Route::middleware('guest')->group(function () {

            Route::get('/login', [PageController::class, 'authLogin'])
                ->name('login');

            Route::get('/register', [PageController::class, 'authRegistration'])
                ->name('register');

            Route::get('/register/complete', [PageController::class, 'authRegistrationComplete'])
                ->name('register.complete');

        });

        Route::middleware('auth')->group(function () {



        });

    });

});

/**
 * /user/* Routes
 *
 */

Route::name('user.')->prefix('user')->group(function () {

    Route::get('/register/action', function () {
        return redirect()->route('pages.auth.register.complete');
    });

    Route::get('/login/{user}', function (User $user) {
        Auth::login($user);

        return redirect()->route('pages.user.profile');
    })->name('login');


    Route::get('/logout', function () {
        Auth::logout();

        return redirect()->route('pages.home');
    })->name('logout');

});


