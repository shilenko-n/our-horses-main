<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Testing\Fluent\Concerns\Has;

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

    /**
     * Попытка выхода из аккаунта
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request)
    {
        if(Auth::check()) {
            Auth::logout();
            $request->session()->regenerate();
        }
        return redirect()->route('pages.home');
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

        $user->sendEmailVerificationNotification();

        return redirect()
            ->route('user.register.complete')
            ->with('email', $user->email);
    }


    /**
     * Попытка отправки письма по сбросу пароля
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function resetSendPassword(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? redirect()->route('password.reset.send')
            : redirect()->route('pages.home');

    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        if($data['password'] !== $data['password_confirmation']) {
            return back()->withErrors([
                'password_confirmation' => __('auth.password_confirmation'),
            ]);
        }

        $token = $data['token'];

        $record = DB::table('password_reset_tokens')->get()->first(function ($item) use ($token) {
            return Hash::check($token, $item->token);
        });

        if(!$record)
            return back()->withErrors([
                'token' => __('auth.token_expired'),
            ]);

        $user = User::query()->where('email', $record->email)->first();

        if(!$user)
            return back()->withErrors([
                'user' => __('auth.failed'),
            ]);


        $credentials = $request->only('password', 'password_confirmation', 'token');
        $credentials['email'] = $user->email;

        $status = Password::reset(
            $credentials,
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(\Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->back()->with('status', __('auth.password_reset_success'))
            : redirect()->back()->with('status', __('auth.password_reset_failed'));
    }

}
