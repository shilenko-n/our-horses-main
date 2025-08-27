<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\Factory;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Главная страница
     *
     * @return View
     */
    public function home(): View
    {
        $popularHorses = Horse::all()->take(4);
        $offers = Offer::all()->take(4);

        return view('pages.home', compact('popularHorses', 'offers'));
    }


    /**
     * Страница пользователя
     *
     * @return View
     */
    public function userProfile(): View
    {
        return view('user.profile');
    }

    /**
     * Страница другого пользователя
     *
     * @param User $user
     * @return View
     */
    public function userProfileShow(User $user): View
    {
        return view('user.profile', compact('user'));
    }


    // Авторизация

    /**
     * Страница авторизации
     *
     * @return View
     */
    public function authLogin(): View
    {
        return view('pages.auth.login');
    }

    /**
     * Страница регистрации
     *
     * @return View
     */
    public function authRegistration(): View
    {
        return view('pages.auth.registration');
    }

    /**
     * Страница подтверждения почты (после регистрации)
     *
     * @return RedirectResponse|View|Factory
     */
    public function authRegistrationComplete(): RedirectResponse|View|Factory
    {
        if(!session('email'))
            return redirect()->route('pages.home');

        return view('pages.auth.registration-complete');
    }
}
