
@extends('layouts.app')


@section('page.content')

    <div class="auth">
        <div class="auth__form">
            <h2>Вход</h2>

            <div class="auth__fields">
                <x-forms.input
                    id="login"
                    size="big"
                    label="Электронный адрес"
                    type="text"
                    name="email"
                    required
                />
                <div>
                    <x-forms.password
                        id="password"
                        size="big"
                        label="Пароль"
                        name="password"
                        required
                    />
                    <x-link
                        class="auth__restore-link"
                        small
                        color="primary"
                        href="/front/pages/auth/reset-password"
                    >Забыли пароль?</x-link>
                </div>

                <x-forms.flag label="Запомнить меня" checked />
            </div>

            <form class="auth__buttons" action="{{route('user.login', ['user' => \App\Models\User::query()->first()->id])}}">
                @csrf

                <x-button
                    is-block
                    size="big"
                    icon="sign-out-alt-solid"
                >Войти</x-button>

                <x-link
                    is-block
                    :href="route('pages.auth.register')"
                >Страница регистрации</x-link>
            </form>
        </div>
    </div>

@endsection
