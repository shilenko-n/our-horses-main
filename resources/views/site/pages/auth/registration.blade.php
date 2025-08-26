@extends('site.layout.template')

@section('page.title', 'Регистрация')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="auth">
		<div class="auth__form">
			<h2>Регистрация</h2>

			<div class="auth__fields">
				<x-forms.input id="name" size="big" label="Имя" type="text" name="name" required />
				<x-forms.input id="last_name" size="big" label="Фамилия" type="text" name="last_name" required />
				<x-forms.input id="email" size="big" label="Электронный адрес" type="email" name="email" placeholder="example@mail.ru" hint="Используется для входа, восстановления пароля и получения уведомлений от сервиса. Никакого спама!" required />

				<x-forms.password id="password" size="big" label="Пароль" name="password" hint="Не менее 6 символов: буквы, цифры и специальные символы" required />
				<x-forms.password id="password_confirmation" size="big" label="Повторите пароль" name="password_confirmation" required />
			</div>

			<form class="auth__buttons" action="/front/pages/auth/registration-complete">
				<small class="hint">Регистрируясь, вы принимаете условия <a href="#">пользовательского соглашения</a>, а также <a href="#">политику обработки персональных данных</a> и даёте согласие на их обработку</small>
				<x-button is-block size="big" icon="check-solid">Зарегистрироваться</x-button>

				<x-link is-block href="/front/pages/auth/login">Страница входа</x-link>
			</form>
		</div>
	</div>
@stop
