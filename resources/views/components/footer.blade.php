@props([
    'sidebar' => false,
])

<footer
    @class([
        'footer',
        'footer_sidebar' => $sidebar
    ])
>
    <p class="footer__company">
        <span>© {{ date('Y') }} Наши кони</span><br>
    </p>

    <div class="footer__links">
        @if ($sidebar)
            <a href="/front/pages/profile/user/view">Новости</a>
        @endif
        <a href="#">Пользовательское соглашение</a>
        <a href="#">Политика конфиденциальности</a>


        @can('admin')
            <a href="/front/pages/support">Написать в поддержку</a>
        @else
            <a href="/front/pages/support">Написать в поддержку</a>
        @endcan

    </div>
</footer>
