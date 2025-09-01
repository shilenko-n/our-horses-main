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
{{--    @php($ya_metrika_counter_id = config('services.ya_metrika.counter_id'))--}}
{{--    @if (env('APP_ENV') == 'production' && $ya_metrika_counter_id)--}}
{{--        <script id="ya-metrika-init" type="text/javascript" src="{{ mix('js/y.metrika-init.js', 'assets/site') }}" data-counter-id="{{ $ya_metrika_counter_id }}"></script>--}}
{{--        <noscript>--}}
{{--            <div><img src="{{ 'https://mc.yandex.ru/watch/' . $ya_metrika_counter_id }}" style="position:absolute; left:-9999px;" alt="" /></div>--}}
{{--        </noscript>--}}
{{--    @endif--}}
    {{-- /Yandex.Metrika --}}
</head>

<body class="layout">
<div id="app">

    <picture class="header-banner">
        <source media="(max-width: 768px)" srcset="{{ asset('img/assets/banners/header/p.png') }}">
        <source media="(min-width: 769px) and (max-width: 1280px)" srcset="{{ asset('img/assets/banners/header/t.png') }}">
        <source media="(min-width: 1281px) and (max-width: 1600px)" srcset="{{ asset('img/assets/banners/header/l.png') }}">
        <img src="{{ asset('img/assets/banners/header/d.png') }}" alt="banner" />
    </picture>

    {{-- Шапка --}}
    <x-header />

    {{-- Контент --}}
    @php($current_url = '/' . request()->path())
    @php($is_admin = mb_stripos(request()->path(), 'admin') !== false)

    <main class="layout__main" id="main">
        <div class="container">
            <div class="container__sidebar">
                <x-main-menu />
            </div>
            <div class="container__content">
                @yield('page.content')
            </div>
        </div>

{{--        @include('site.blocks.mobile-menu', ['isAdmin' => $is_admin, 'currentUrl' => $current_url])--}}

        <button class="up-button up-button_big scroll-top" type="button">
            <x-icon icon="chevron-up-solid" />
        </button>
    </main>

    {{-- Модалки --}}
    @include('partials.modals.contacts')
    @include('partials.modals.recall-notice')

    @include('partials.modals.complaint')
    @include('partials.modals.complaint-complete')

</div>

<!-- Модальное окно -->
{{--@livewire('modal')--}}

{{-- Скрипты --}}
@vite(['resources/js/app.js'])
@livewireScripts <!-- Подключение скриптов Livewire -->
@stack('scripts')
</body>

</html>
