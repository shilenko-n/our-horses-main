<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('page.description')" />
    <meta name="keywords" content="@yield('page.keywords')" />
    <title>{{ setting('main.title') }}</title>

    @vite(['resources/scss/style.scss'])

    @livewireStyles
</head>
<body class="layout">

    <div id="app">

        <x-header />

        {{-- Контент --}}
        <main class="layout__main" id="main">
            @yield('page.content')
        </main>

    </div>

    @vite(['resources/js/app.js'])
    @livewireScripts
</body>
</html>
