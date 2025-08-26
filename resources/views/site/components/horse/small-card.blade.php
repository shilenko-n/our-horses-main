<a {{ $attributes->class(['horse-small-card', 'horse-small-card_unsubscribed' => !$isSubscribed && !$hasEdit && $showButton]) }}>
	<div class="horse-small-card__photo">
		@if ($isPositioning)
			<x-button class="horse-small-card__move-btn" onclick="event.preventDefault()" size="small" color="pale" icon="move-solid" />
		@endif
		@php($number = str_pad(fake()->numberBetween(1, 15), 2, '0', STR_PAD_LEFT))
		<picture>
			<source media="(max-width: 768px)" srcset="{{ $horse['photo']['p'] }}">
			<source media="(min-width: 769px) and (max-width: 1280px)" srcset="{{ $horse['photo']['t'] }}">
			<source media="(min-width: 1281px) and (max-width: 1600px)" srcset="{{ $horse['photo']['l'] }}">
			<img class="horse-small-card__image" src="{{ $horse['photo']['d'] }}" alt="">
		</picture>
		@if ($price)
			<div class="horse-small-card__price">{{ format_price($price) }}</div>
		@endif
	</div>
	<div class="horse-small-card__content">
		<div class="horse-small-card__info">
			<div class="horse-small-card__horse-name">
				<h4>{{ $horse['name'] }}</h4>
				@if (!$hideBadges && ($horse['records'] || $horse['mentions']) && !$moderation && !$isRevision)
					<div class="horse-small-card__badges">
						<div class="horse__badge">{{ $horse['records'] }}</div>
						<div class="horse__badge">{{ $horse['mentions'] }}</div>
					</div>
				@endif

				@if ($moderation)
					<span class="horse-small-card__status horse-small-card__status_moderation">На модерации</span>
				@elseif ($isRevision)
					<span class="horse-small-card__status horse-small-card__status_is-revision">Требуется доработка</span>
				@endif
			</div>
			@if (!$moderation && !$isRevision && !$hideOwner)
				<div class="horse-small-card__user">
					<div class="horse-small-card__user-name">{{ $horse['user'] }}</div>
					<div class="horse-small-card__user-location">{{ $horse['location'] }}</div>
				</div>
			@endif
		</div>
		@if (!$moderation && !$isRevision && $showButton)
			<div class="horse-small-card__buttons">
				@if ($isSubscribed && !$hasEdit)
					<x-button is-block size="small" onclick="event.preventDefault()" color="pale" icon="user-minus-solid">Отписаться</x-button>
				@elseif (!$isSubscribed && !$hasEdit)
					<x-button is-block size="small" onclick="event.preventDefault()" color="pale" icon="user-plus-solid">Подписаться</x-button>
				@elseif($hasEdit)
					<x-button is-block size="small" onclick="event.preventDefault();window.location.replace('{{ $editUrl }}');" color="pale" icon="pencil-alt-solid">Редактировать</x-button>
				@endif
			</div>
		@endif
	</div>
</a>
