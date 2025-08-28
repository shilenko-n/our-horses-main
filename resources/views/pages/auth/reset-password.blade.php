
@extends('layouts.app')

@section('page.content')

    <div class="auth">
        <form
            class="auth__form"
            action="{{route('password.reset.send.process')}}"
            method="post"
        >
            @csrf
            <h2>Восстановление пароля</h2>

            <div class="auth__fields">
                <x-forms.input
                    id="login"
                    size="big"
                    label="Электронный адрес"
                    type="text"
                    placeholder="example@email.ru"
                    hint="На электронный адрес будет отправлено письмо с ссылкой на сброс пароля"
                    name="email"
                    required
                />
            </div>

            <div class="auth__buttons">
                {{-- <x-button class="btn_accent btn_block btn_big" icon="check-solid">Отправить письмо</x-button> --}}
{{--                <x-link--}}
{{--                    type="submit"--}}
{{--                    is-block--}}
{{--                    size="big"--}}
{{--                    button--}}
{{--                    icon="check-solid"--}}
{{--                >Отправить письмо</x-link>--}}

                <x-button class="btn_accent btn_block btn_big" icon="check-solid">Отправить письмо</x-button>

                <x-link
                    is-block
                    href="/front/pages/auth/login"
                >Страница входа</x-link>
            </div>
        </form>
    </div>

@endsection
