<footer class="footer {{ $sidebar ?? false ? 'footer_sidebar' : '' }}">
	<p class="footer__company">
		<span>© {{ date('Y') }} Наши кони</span><br>
	</p>

	<div class="footer__links">
		@if ($sidebar ?? false)
			<a href="/front/pages/profile/user/view">Новости</a>
		@endif
		<a href="#">Пользовательское соглашение</a>
		<a href="#">Политика конфиденциальности</a>
		@if (isset($isAdmin))
			@if(!$isAdmin ?? false)
				<a href="/front/pages/support">Написать в поддержку</a>
			@endif
		@else
			<a href="/front/pages/support">Написать в поддержку</a>
		@endif
	</div>
</footer>
