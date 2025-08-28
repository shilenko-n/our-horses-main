
@extends('layouts.app')

@section('page.content')
    <div class="auth">
        <form
            class="auth__form"
            action="{{route('password.reset.process')}}"
            method="post"
        >
            @csrf
            <h2>Восстановление пароля</h2>

            <div class="auth__fields">
                <input type="hidden" name="token" value="{{$token}}">

                <x-forms.password
                    id="password"
                    size="big"
                    label="Пароль"
                    hint="Не менее 6 символов: буквы, цифры и специальные символы"
                    name="password"
                    required
                />
                <x-forms.password
                    id="password-confirmation"
                    size="big"
                    label="Повторите пароль"
                    name="password_confirmation"
                    required
                />
            </div>

            <div class="auth__buttons">
                <x-button is-block size="big" icon="check-solid">Сохранить новый пароль</x-button>
            </div>

            @if($errors->any())
                <div class="error">

                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach

                </div>
            @endif

            @if(session('status'))
                <p>{{session('status')}}</p>
            @endif
        </form>
    </div>
@endsection
