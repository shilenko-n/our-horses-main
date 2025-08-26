@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="settings">
		<div class="personal-settings">
			<div class="personal-settings__header">
				<x-breadcrumbs :items="[['title' => 'Настройки', 'url' => '/front/pages/profile/settings']]" />
				<h2 class="personal-settings__title">Личные данные и безопасность</h2>
			</div>
			<div class="personal-settings__block">
				<h3 class="personal-settings__sub-title">Системные данные</h3>
				<div class="personal-settings__form">
					<x-forms.input size="big" type="email" label="Электронный адрес" hint="Используется для входа, восстановления пароля и получения уведомлений от сервиса. Никакого спама!" placeholder="example@mail.ru" required />
					<div class="personal-settings__form-columns">
						<x-forms.password size="big" label="Пароль" hint="Не менее 6 символов: буквы, цифры и специальные символы" required />
						<x-forms.password size="big" label="Повторите пароль" required />
					</div>
					<x-button class="w-100-p" size="big" icon="check-solid">Сохранить</x-button>
				</div>
			</div>
			<div class="personal-settings__block">
				<h3 class="personal-settings__sub-title">Персональные данные</h3>
				<div class="personal-settings__form">
					<div class="personal-settings__photo">
						<img class="personal-settings__image" src="https://placehold.co/240x240">
						<x-forms.file hint="В формате JPEG или PNG. Максимальный размер — 8 MB." />
					</div>
					<div class="personal-settings__form-columns">
						<x-forms.input type="text" size="big" label="Имя" placeholder="Иван" required />
						<x-forms.input type="text" size="big" label="Фамилия" placeholder="Иванов" required />
					</div>
					<div class="personal-settings__form-columns">
						<x-forms.input size="big" type="date" label="Дата рождения" required />
						<div class="personal-settings__form-radio">
							<label>Пол</label>
							<div>
								<x-forms.flag type="radio" name="sex" checked label="Мужской" />
								<x-forms.flag type="radio" name="sex" label="Женский" />
							</div>
						</div>
					</div>
					<div class="personal-settings__form-columns">
						<x-forms.select size="big" label="Страна" required>
							<option value="">Россия</option>
						</x-forms.select>
						<x-forms.select size="big" label="Населённый пункт" required>
							<option value="">Санкт-Петербург</option>
						</x-forms.select>
					</div>
					<div class="personal-settings__form-columns">
						<x-forms.input size="big" type="text" label="Телефон" placeholder="+7 (999) 999-99-99" required />

					</div>
					<x-forms.textarea rows="10" label="Обо мне">Меня зовут Иван Иванов, я из Питера. Моё имя и фамилия — не шутка, ведь я ещё и Иванов Иван Иванович. И я не один такой, у меня в школе трудовика также звали.</x-forms.textarea>
					<x-button class="w-100-p" icon="check-solid" size="big">Сохранить</x-button>
				</div>
			</div>
		</div>
	</div>
@stop
