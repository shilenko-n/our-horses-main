<div class="main-menu__general">
    @foreach($mainItems as $mainItem)
        @if(Auth::check() && $mainItem->role_access <= Auth::user()->role || $mainItem->role_access === 0)
            <a
                @class([
                    'main-menu__item',
        //			'main-menu__item_active' => $mainItem['url'] === $currentItem,
		        ])
            >
                <x-icon icon="{{ $mainItem->icon }}" />
                <span>{{ $mainItem->name }}</span>
            </a>
        @endif
    @endforeach
</div>

<footer class="footer footer_sidebar">
    <p class="footer__company">
        <span>© {{ date('Y') }} Наши кони</span><br>
    </p>

    <div class="footer__links">
        <a href="/front/pages/profile/user/view">Новости</a>
        <a href="#">Пользовательское соглашение</a>
        <a href="#">Политика конфиденциальности</a>
{{--        @if (isset($isAdmin))--}}
{{--            @if(!$isAdmin ?? false)--}}
{{--                <a href="/front/pages/support">Написать в поддержку</a>--}}
{{--            @endif--}}
{{--        @else--}}
{{--            <a href="/front/pages/support">Написать в поддержку</a>--}}
{{--        @endif--}}
    </div>
</footer>
