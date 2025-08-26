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
	{{-- <link type="text/css" rel="stylesheet" href="{{ mix('css/style.css', 'assets/site') }}"> --}}

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
		@yield('page.header-banner')
		{{-- Шапка --}}
		@include('site.blocks.header')

		{{-- Контент --}}
		<main class="layout__main" id="main">
			@yield('page.content')
		</main>

		{{-- Подвал --}}
		@include('site.blocks.footer')

		{{-- Модалки --}}
		@include('site.blocks.modals.contacts')
		@include('site.blocks.modals.recall-notice')
	</div>

	{{-- Скрипты --}}
	@vite(['resources/js/app.js'])
	@livewireScripts <!-- Подключение скриптов Livewire -->
	{{-- <script src="{{ mix('js/manifest.js', 'assets/site') }}"></script>
	<script src="{{ mix('js/vendor.js', 'assets/site') }}"></script>
	<script src="{{ mix('js/app.js', 'assets/site') }}"></script> --}}
</body>

</html>
