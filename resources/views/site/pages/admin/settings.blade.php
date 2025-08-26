@extends('site.layout.template-without-footer')

@section('page.title', 'Страница администратора - Настройки сайта')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="settings-page">
		<div class="settings-page__header">
			<h2>Настройки сайта</h2>
		</div>

		<div class="settings-page__content">

			<div class="settings-page__content__group">
				<h3 class="mb-8">Метатеги для главной страницы</h3>
				<p class="mb-16">Метатеги нужны для того, что передавать поисковой системе краткую информацию о содержимом страницы.</p>
				<div class="settings-page__content__group__controls">
					<x-forms.input size="big" label="Заголовок главной страницы" hint="Отображается во вкладке браузера как название страницы" value="Наши кони" required />
					<x-forms.input size="big" label="Описание для поисковых систем" value="Наши кони — социальная сеть для любителей лошадей" required />
					<x-forms.textarea row="5" label="Ключевые слова" hint="Укажите через запятую слова, которые связаны с сайтом по смыслу" value="Лошади, заводчики лошадей, конюшни, купить лошадь, статьи о лошадях" required />
				</div>
			</div>

			<div class="settings-page__content__group settings-page__content__group_bt">
				<h3 class="mb-16">Новости</h3>
				<x-forms.input size="big" label="Ссылка на пользователя" hint="Страница указанного пользователя будет показываться во вкладке «Новости»" value="http://www.nashikoni.ru/romanromanov" required />
			</div>

			<div class="settings-page__content__group settings-page__content__group_bt">
				<h3 class="mb-16">Размещение объявлений</h3>
				<div class="settings-page__content__group__group mb-24">
					<p class="forms-input__label forms-input__label-required-char">Стоимость размещения объявления о продаже, ₽</p>
					<x-forms.flag label="Бесплатно" />
					<x-forms.select required>
						<option value="">300</option>
						<option value="">400</option>
						<option value="">500</option>
					</x-forms.select>
				</div>

				<div class="settings-page__content__group__group">
					<p class="forms-input__label forms-input__label-required-char">Стоимость размещения объявления о продаже, ₽</p>
					<x-forms.flag label="Бесплатно" checked />
					<x-forms.select disabled required>
						<option value="">0</option>
						<option value="">300</option>
						<option value="">400</option>
						<option value="">500</option>
					</x-forms.select>
				</div>
			</div>

			<div class="settings-page__content__footer">
				<x-button class="w-100-p" icon="check-solid" size="big" type="submit">Сохранить</x-button>
			</div>
		</div>

	</div>
@stop
