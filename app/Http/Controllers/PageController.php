<?php

namespace App\Http\Controllers;

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
        return view('pages.home');
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
}
