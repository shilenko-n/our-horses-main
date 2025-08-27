<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * Попытка авторизации пользователя
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect()->route('pages.user.profile');
        }

        return back()->withErrors([
            'auth' => __('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {

    }

    /**
     * Попытка регистрации пользователя
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request)
    {

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);

        if($data['password'] !== $data['password_confirmation'])
        {
            return back()->withErrors([
                'password_confirmation' => __('auth.password_confirmation'),
            ]);
        }

        $user = User::query()->create($data);

        return redirect()
            ->route('pages.auth.register.complete')
            ->with('email', $user->email);
    }

}
