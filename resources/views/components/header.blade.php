
<header
    class="header
        @auth header_logined @endauth"
    id="header"
>

    <div class="header__left-side">
        <a
            class="header__logo @auth header__logo_logined @endauth"
            href="{{route('pages.home')}}"
        >
            <img
                class="header__logo_full"
                alt="header logo"
                src="{{ asset('img/layout/logo-full.svg') }}"
            />
            <img
                class="header__logo_short"
                alt="header logo"
                src="{{ asset('img/layout/logo-short.svg') }}"
            />
        </a>
        @auth
            <div class="header__search">
                <x-forms.input />
{{--                <x-forms.input id="id" type="text" name="search" icon="search-solid" icon-right placeholder="Поиск" />--}}
            </div>
        @endauth
    </div>

</header>
