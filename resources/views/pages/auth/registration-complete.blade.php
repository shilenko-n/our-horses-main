
@extends('layouts.app')


@section('page.content')

    <div class="auth">
        <div class="auth__notice">
            <div class="auth__notice-text">
                <h2>Подтвердите электронный адрес</h2>
                <p>Мы отправили на электронный адрес <a href="#">{{session('email')}}</a> письмо с инструкцией. Пожалуйста, проверьте вашу почту.</p>
            </div>

            @guest
                <x-link
                    icon="long-arrow-right"
                    icon-right
                    :href="route('pages.auth.login')"
                >Перейти на страницу входа</x-link>
            @endguest
        </div>
    </div>

@endsection
