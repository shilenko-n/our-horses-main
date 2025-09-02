
<header
    @class([
        'header',
        'header_logined' => Auth::check(),
    ])
    id="header"
>

    <div class="header__left-side">
        <a
            @class([
                'header__logo',
                'header__logo_logined' => Auth::check(),
            ])
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
                <x-forms.input
                    id="id"
                    type="text"
                    name="search"
                    icon="search-solid"
                    icon-right
                    placeholder="Поиск"
                />
            </div>
        @endauth
    </div>

    @auth
        <div class="header__account">
            <x-user.mini-card
                :href="route('pages.user.profile')"
                :username="Auth::user()->name"
                :photo="Auth::user()->getAvatarUrl()"
            />
        </div>
    @endauth

    <div
        @class([
            'header__buttons',
            'header__buttons_logined' => Auth::check(),
        ])
    >

        @auth

            <div class="header__balance">
                <div class="header__balance-value">{{Auth::user()->balance}} ₽</div>
                <x-link
                    class="header__button"
                    size="responsive"
                    button
                    href="/front/pages/profile/settings/payments"
                    color="white"
                >Пополнить</x-link>
            </div>

            <x-link
                class="header__button header__button_search header__button_logined"
                size="responsive"
                color="white"
                button
                href="/front/pages/search"
                icon="search-solid"
            />

            <div class="header__button_with-counter header__button_comments">
                <x-link
                    class="header__button header__button_logined"
                    size="responsive"
                    button
                    color="white"
                    href="/front/pages/profile/chat"
                    icon="comments-solid"
                />
                <x-notification-counter class="header__notification-counter" :count="12" />
            </div>

            <div class="header__button_with-counter">
                <x-link
                    class="header__button header__button_logined"
                    size="responsive"
                    button
                    color="white"
                    href="/front/pages/notices"
                    icon="bell-solid"
                    :disabled="request()->path() == 'front/pages/notices'"
                />
                <x-notification-counter class="header__notification-counter" :count="4" />
            </div>

            <x-link
                class="header__button header__button_logined"
                size="responsive"
                button
                color="white"
                href="/front/pages/profile/settings"
                icon="cog-solid"
                :disabled="request()->path() == 'front/pages/profile/settings'"
            />
            <x-link
                class="header__button header__button_logined"
                size="responsive"
                button
                color="white"
                href="{{ route('user.logout') }}"
                icon="sign-out-alt-solid"
            />

        @endauth

        @guest

            <x-link
                class="header__button header__button_transforming header__button_search"
                button
                color="white"
                icon="search-solid"
                @click="openModal('search-modal')"
            />

            <x-link
                class="header__button header__button_transforming"
                button
                color="white"
                :href="route('pages.auth.login')"
                icon="sign-out-alt-solid"
                :disabled="request()->path() == 'front/pages/auth/login'"
            >
                Войти
            </x-link>

            <x-link
                class="header__button header__button_transforming_accent"
                :href="route('pages.auth.register')"
                icon="user-plus-solid"
                button
                :disabled="request()->path() == 'front/pages/auth/registration'"
            >
                Зарегистрироваться
            </x-link>

            <x-modal name="search-modal">
                <h2 class="search-modal__title">Ищите людей, лошадей и товары для них!</h2>

                <x-forms.input
                    size="big"
                    icon="search-solid"
                    icon-right
                    placeholder="Поиск"
                />
            </x-modal>

        @endguest

    </div>

</header>
