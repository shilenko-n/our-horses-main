@extends('site.layout.template')

@section('page.title', 'Восстановление пароля')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="auth">
		<form class="auth__form">
			<h2>Восстановление пароля</h2>

			<div class="auth__fields">
				<x-forms.input id="login" size="big" label="Электронный адрес" type="text" placeholder="example@email.ru" hint="На электронный адрес будет отправлено письмо с ссылкой на сброс пароля" name="email" required />
			</div>

			<div class="auth__buttons">
				{{-- <x-button class="btn_accent btn_block btn_big" icon="check-solid">Отправить письмо</x-button> --}}
				<x-link is-block size="big" href="/front/pages/auth/reset-password-send-email" button icon="check-solid">Отправить письмо</x-link>

				<x-link is-block href="/front/pages/auth/login">Страница входа</x-link>
			</div>
		</form>
	</div>
@stop
