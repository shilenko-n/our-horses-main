<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Offer;
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
}
