
@extends('layouts.app')


@section('page.content')

    <div class="auth">
        <form
            class="auth__form"
            method="post"
            action="{{route('user.register.process')}}"
        >
            @csrf
            <h2>Регистрация</h2>

            <div class="auth__fields">
                <x-forms.input
                    id="name"
                    size="big"
                    label="Имя"
                    type="text"
                    name="name"
                    required
                />

                <x-forms.input
                    id="last_name"
                    size="big"
                    label="Фамилия"
                    type="text"
                    name="surname"
                    required
                />

                <x-forms.input
                    id="email"
                    size="big"
                    label="Электронный адрес"
                    type="email"
                    name="email"
                    placeholder="example@mail.ru"
                    hint="Используется для входа, восстановления пароля и получения уведомлений от сервиса. Никакого спама!"
                    required
                />

                <x-forms.password
                    id="password"
                    size="big"
                    label="Пароль"
                    name="password"
                    hint="Не менее 6 символов: буквы, цифры и специальные символы"
                    required
                />

                <x-forms.password
                    id="password_confirmation"
                    size="big"
                    label="Повторите пароль"
                    name="password_confirmation"
                    required
                />
            </div>

            <div class="auth__buttons">
                <small class="hint">
                    Регистрируясь, вы принимаете условия <a href="#">пользовательского соглашения</a>, а также <a href="#">политику обработки персональных данных</a> и даёте согласие на их обработку
                </small>

                <x-button is-block size="big" icon="check-solid">Зарегистрироваться</x-button>

                <x-link is-block :href="route('pages.auth.login')">Страница входа</x-link>
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
