<?php

use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

use App\Models\User;

use App\Http\Controllers\PageController;

/**
 * All root routes (All main pages)
 *
 */

Route::name('pages.')->group(function () {

    Route::get('/', [PageController::class, 'home'])->name('home');

    Route::name('user.')->prefix('user')->group(function () {

        Route::middleware(['auth', 'email'])->group(function () {
            Route::get('/profile', [PageController::class, 'userProfile'])->name('profile');
        });

        Route::get('/profile/{user}', [PageController::class, 'userProfileShow'])->name('profile.show');
    });

    Route::name('auth.')->prefix('auth')->group(function () {

        Route::middleware('guest')->group(function () {

            Route::get('/login', [PageController::class, 'authLogin'])->name('login');
            Route::get('/register', [PageController::class, 'authRegistration'])->name('register');

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

    Route::get('/register/complete', [PageController::class, 'authRegistrationComplete'])->name('register.complete');

    Route::middleware('auth')->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    });


});


Route::name('user.')->prefix('user')->group(function () {

    Route::middleware('guest')->group(function () {

        Route::post('/login', [AuthController::class, 'login'])->name('login.process');
        Route::post('/register', [AuthController::class, 'register'])->name('register.process');

    });

});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

    $request->fulfill();
    return redirect()->route('pages.user.profile');

})->middleware(['auth', 'signed'])->name('verification.verify');


