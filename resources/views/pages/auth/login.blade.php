
@extends('layouts.app')


@section('page.content')

    <div class="auth">
        <form
            class="auth__form"
            action="{{ route('user.login.process') }}"
            method="post"
        >
            @csrf
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

            <div class="auth__buttons">
                <x-button
                    is-block
                    size="big"
                    icon="sign-out-alt-solid"
                >Войти</x-button>

                <x-link
                    is-block
                    :href="route('pages.auth.register')"
                >Страница регистрации</x-link>
            </div>

            @if($errors->any())
                <div class="error">

                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach

                </div>
            @endif
        </form>
    </div>

@endsection
