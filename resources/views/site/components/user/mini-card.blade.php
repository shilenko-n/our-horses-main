<a {{ $attributes->class(['user-mini-card', 'user-mini-card_dark' => $dark, 'user-mini-card_extend' => $nickname]) }}>
	<img class="user-mini-card__photo" src="{{ $photo }}" />
	<div>
		@if ($nickname)
			<div class="user-mini-card__nickname">{{ $nickname }}</div>
			<div class="user-mini-card__author">
				<span class="hint">Автор поста</span> <span class="user-mini-card__author-name hint hint_bold">{{ $username }}</span>
			</div>
		@else
			<div class="user-mini-card__author">
				<span class="user-mini-card__author-name">{{ $username }}</span>
				@if($location)
					<div class="user-mini-card__author">
						<span class="hint">{{ $location }}</span>
					</div>
				@endif
			</div>
		@endif

	</div>
</a>
