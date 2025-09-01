<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $user = auth()->user();
        return view('user.profile', [
            'user'      => $user,
            'isSelf'    => true,
        ]);
    }

    /**
     * Страница другого пользователя
     *
     * @param string $nickname
     * @return View|RedirectResponse
     */
    public function userProfileShow(string $nickname): View|RedirectResponse
    {
        $user = User::query()->where('nickname', $nickname)->first();

        if(!$user)
            throw new NotFoundHttpException();

        return view('user.profile', [
            'user'      => $user,
            'isSelf'    => auth()->check() && auth()->id() == $user->id,
        ]);
    }

    /**
     * Страница настроек пользователя
     *
     * @return View
     */
    public function userSettings(): View
    {
        return view('user.settings');
    }

    /**
     * Страница личные данные и безопасность
     *
     * @return View
     */
    public function userSettingsPersonal(): View
    {
        return view('user.settings.personal');
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
        if(auth()->check() && auth()->user()->hasVerifiedEmail())
            return redirect()->route('pages.user.profile');

        if(!session('email'))
            return redirect()->route('pages.home');

        return view('pages.auth.registration-complete');
    }


    /**
     * Страница сброса пароля
     *
     * @return View
     */
    public function resetPassword(): View
    {
        return view('pages.auth.reset-password');
    }

    /**
     * @return View
     */
    public function resetPasswordSend(): View
    {
        return view('pages.auth.reset-password-send');
    }

    public function resetPasswordShow(string $token): View
    {
        return view('pages.auth.reset-password-new', [
            'token' => $token,
        ]);
    }
}
