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

            Route::get('/profile/settings', [PageController::class, 'userSettings'])->name('settings');

            Route::get('/profile/settings/personal', [PageController::class, 'userSettingsPersonal'])->name('settings.personal');

            Route::prefix('horses')->name('horses.')->group(function () {

                Route::get('/my', [PageController::class, 'userMyHorses'])->name('my');
                Route::get('/add', [PageController::class, 'userAddHorse'])->name('add');


                Route::get('/{nickname}', [PageController::class, 'userMyHorses'])->name('list');


            });


            Route::prefix('subscribers')->name('subscribers.')->group(function () {


                Route::get('/users', [PageController::class, 'userSubscribers'])->name('users');
                Route::get('/users/{nickname}', [PageController::class, 'userSubscribers'])->name('users.nickname');

                Route::get('/horses', [PageController::class, 'horsesSubscribers'])->name('horses');
                Route::get('/horses/{nickname}', [PageController::class, 'horsesSubscribers'])->name('horses.nickname');

                Route::get('/breeds', [PageController::class, 'breedsSubscribers'])->name('breeds');
                Route::get('/breeds/{nickname}', [PageController::class, 'breedsSubscribers'])->name('breeds.nickname');

                Route::get('/', [PageController::class, 'subscribers'])->name('own');
                Route::get('/{nickname}', [PageController::class, 'subscribers'])->name('own.nickname');


            });

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

    Route::name('horse.')->prefix('horse')->group(function () {

        Route::get('/view/{horse}', [PageController::class, 'horseView'])->name('view');

        Route::get('/breed', [PageController::class, 'horseBreeds'])->name('breed.all');

        Route::middleware(['auth', 'email'])->group(function () {

            Route::get('/edit/{horse}', [PageController::class, 'horseEdit'])->name('edit');

        });

        Route::name('diary.')->prefix('diary')->group(function () {

            Route::middleware(['auth', 'email'])->group(function () {
                Route::get('/create/{horse}', [PageController::class, 'diaryCreate'])->name('create');
            });

            Route::get('/all/{horse}', [PageController::class, 'horseDiaryAll'])->name('all');

        });


    });

    Route::name('diary.')->prefix('diary')->group(function () {

        Route::get('/{blog}', [PageController::class, 'diaryShow'])->name('show');

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


