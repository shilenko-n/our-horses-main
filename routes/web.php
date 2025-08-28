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

        Route::get('/profile/{nickname}', [PageController::class, 'userProfileShow'])->name('profile.show');
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

Route::middleware('guest')->group(function () {

    Route::get('/password/reset', [PageController::class, 'resetPassword'])
        ->name('password.reset.request');

    Route::get('/password/reset/send', [PageController::class, 'resetPasswordSend'])
        ->name('password.reset.send');

    Route::post('/password/reset/send', [AuthController::class, 'resetSendPassword'])
        ->name('password.reset.send.process');

    Route::get('/password/reset/{token}', [PageController::class, 'resetPasswordShow'])
        ->name('password.reset');

    Route::post('/password/reset', [AuthController::class, 'resetPassword'])
        ->name('password.reset.process');

});




/**
 * Верификация почты после создания пользователя
 *
 */

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

    $request->fulfill();
    return redirect()->route('pages.user.profile');

})->middleware(['auth', 'signed'])->name('verification.verify');


