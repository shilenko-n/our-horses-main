@extends('site.layout.template')

@section('page.title', 'Восстановление пароля')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="auth">
		<div class="auth__form">
			<h2>Восстановление пароля</h2>

			<div class="auth__fields">
				<x-forms.password id="password" size="big" label="Пароль" hint="Не менее 6 символов: буквы, цифры и специальные символы" name="password" required />
				<x-forms.password id="password-confirmation" size="big" label="Повторите пароль" name="password_confirmation" required />
			</div>

			<div class="auth__buttons">
				<x-button is-block size="big" icon="check-solid">Сохранить новый пароль</x-button>
			</div>
		</div>
	</div>
@stop
