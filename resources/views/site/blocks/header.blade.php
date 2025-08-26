@php($auth = session('auth'))
<header class="header {{ $auth ? 'header_logined' : '' }}" id="header">
	<div class="header__left-side">
		<a class="header__logo {{ $auth ? 'header__logo_logined' : '' }}" href="/">
			<img class="header__logo_full" src="{{ asset('img/layout/logo-full.svg') }}">
			<img class="header__logo_short" src="{{ asset('img/layout/logo-short.svg') }}">
		</a>
		@if ($auth)
			<div class="header__search">
				<x-forms.input id="id" type="text" name="search" icon="search-solid" icon-right placeholder="Поиск" />
			</div>
		@endif
	</div>

	@if ($auth)
		<div class="header__account">
			@php($human = fake()->human(0))
			<x-user.mini-card href="/front/pages/profile/user/view" username="{{ $human['name'] }}" :dark="false" photo="{{ $human['photo'] }}" />
		</div>
	@endif

	<div class="header__buttons {{ $auth ? 'header__buttons_logined' : '' }}">
		@if ($auth)
			<div class="header__balance">
				<div class="header__balance-value">1 250 ₽</div>
				<x-link class="header__button" size="responsive" button href="/front/pages/profile/settings/payments" color="white">Пополнить</x-link>
			</div>
			<x-link class="header__button header__button_search header__button_logined" size="responsive" color="white" button href="/front/pages/search" icon="search-solid" />
			{{-- <x-link class="btn btn_white header__button header__button_logined" href="#" icon="search-solid" button /> --}}
			<div class="header__button_with-counter header__button_comments">
				<x-link class="header__button header__button_logined" size="responsive" button color="white" href="/front/pages/profile/chat" icon="comments-solid" />
				<x-notification-counter class="header__notification-counter" :count="12" />
			</div>
			<div class="header__button_with-counter">
				<x-link class="header__button header__button_logined" size="responsive" button color="white" href="/front/pages/notices" icon="bell-solid" :disabled="request()->path() == 'front/pages/notices'" />
				<x-notification-counter class="header__notification-counter" :count="4" />
			</div>
			<x-link class="header__button header__button_logined" size="responsive" button color="white" href="/front/pages/profile/settings" icon="cog-solid" :disabled="request()->path() == 'front/pages/profile/settings'" />
			<x-link class="header__button header__button_logined" size="responsive" button color="white" href="{{ route('site.logout') }}" icon="sign-out-alt-solid" />
		@else
			<x-link class="header__button header__button_transforming header__button_search" button color="white" icon="search-solid" @click="openModal('search-modal')" />
			<x-link class="header__button header__button_transforming" button color="white" href="/front/pages/auth/login" icon="sign-out-alt-solid" :disabled="request()->path() == 'front/pages/auth/login'">
				Войти
			</x-link>

			<x-link class="header__button header__button_transforming_accent" href="/front/pages/auth/registration" icon="user-plus-solid" button :disabled="request()->path() == 'front/pages/auth/registration'">
				Зарегистрироваться
			</x-link>

			<x-modal name="search-modal">
				<h2 class="search-modal__title">Ищите людей, лошадей и товары для них!</h2>
				<x-forms.input size="big" icon="search-solid" icon-right placeholder="Поиск" />
			</x-modal>
		@endif
	</div>

</header>
