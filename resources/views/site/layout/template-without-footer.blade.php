<!doctype html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=1.0">
	<meta name="description" content="@yield('page.description')" />
	<meta name="keywords" content="@yield('page.keywords')" />

	<title>@yield('page.title')</title>

	{{-- <link rel="shortcut icon" href="{{ asset('img/layout/favicon.svg') }}"> --}}
	@vite(['resources/scss/style.scss'])
	@livewireStyles <!-- Подключение стилей Livewire -->

	{{-- Yandex.Metrika --}}
	@php($ya_metrika_counter_id = config('services.ya_metrika.counter_id'))
	@if (env('APP_ENV') == 'production' && $ya_metrika_counter_id)
		<script id="ya-metrika-init" type="text/javascript" src="{{ mix('js/y.metrika-init.js', 'assets/site') }}" data-counter-id="{{ $ya_metrika_counter_id }}"></script>
		<noscript>
			<div><img src="{{ 'https://mc.yandex.ru/watch/' . $ya_metrika_counter_id }}" style="position:absolute; left:-9999px;" alt="" /></div>
		</noscript>
	@endif
	{{-- /Yandex.Metrika --}}
</head>

<body class="layout">
	<div id="app">

		<picture class="header-banner">
			<source media="(max-width: 768px)" srcset="{{ asset('img/assets/banners/header/p.png') }}">
			<source media="(min-width: 769px) and (max-width: 1280px)" srcset="{{ asset('img/assets/banners/header/t.png') }}">
			<source media="(min-width: 1281px) and (max-width: 1600px)" srcset="{{ asset('img/assets/banners/header/l.png') }}">
			<img src="{{ asset('img/assets/banners/header/d.png') }}" />
		</picture>

		{{-- Шапка --}}
		@include('site.blocks.header')

		{{-- Контент --}}
		@php($current_url = '/' . request()->path())
		@php($is_admin = mb_stripos(request()->path(), 'admin') !== false)

		<main class="layout__main" id="main">
			<div class="container">
				<div class="container__sidebar">
					<x-main-menu :is-admin="$is_admin" current-item="{{ $current_url }}" />
				</div>
				<div class="container__content">
					@yield('page.content')
				</div>
			</div>

			@include('site.blocks.mobile-menu', ['isAdmin' => $is_admin, 'currentUrl' => $current_url])

			<button class="up-button up-button_big scroll-top" type="button">
				<x-icon icon="chevron-up-solid" />
			</button>
		</main>

		{{-- Модалки --}}
		@include('site.blocks.modals.contacts')
		@include('site.blocks.modals.recall-notice')
		<x-modal name="complaint_modal">
			<div class="complaint">
				<div class="complaint__header">Отправка жалобы</div>
				<div class="complaint__content">
					<x-forms.select size="big" label="Тема жалобы" required>
						<option value="">Несанкцинированное предпринимательство</option>
					</x-forms.select>
					<x-forms.textarea cols="10" label="Комментарий" placeholder="Расскажите, что именно сделал пользователь" />
				</div>
				<div class="complaint__button">
					<x-button is-block @click="openModal('complaint_modal_complete')" icon="check-solid">Отправить жалобу</x-button>
				</div>
			</div>
		</x-modal>

		<x-modal name="complaint_modal_complete">
			<div class="complaint">
				<div class="complaint__content complaint__content_text">
					<div class="complaint__header">Жалоба отправлена</div>
					<span>Мы рассмотрим ваше обращение в ближайшее рабочее время.</span>
				</div>
				<div class="complaint__button">
					<x-link is-block href="/front/pages/profile/guest/view" button icon="chevron-left-solid">вернуться на страницу</x-link>
				</div>
			</div>
		</x-modal>
	</div>

	<!-- Модальное окно -->
	@livewire('modal')

	{{-- Скрипты --}}
	@vite(['resources/js/app.js'])
	@livewireScripts <!-- Подключение скриптов Livewire -->
	@stack('scripts')
</body>

</html>
