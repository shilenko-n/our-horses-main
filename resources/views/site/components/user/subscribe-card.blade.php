<a {{ $attributes->class(['user-subscribe-card', 'user-subscribe-card_unsubscribed' => !$isSubscribed && $isActive]) }}>
	<div class="user-subscribe-card__photo">
		<img src="{{ $user['photo'] }}">
	</div>
	<div class="user-subscribe-card__personal">
		<div class="user-subscribe-card__info">
			<h4 class="user-subscribe-card__name">{{ $user['name'] }}</h4>
			@if (fake()->boolean())
				<x-user-status is-small />
			@else
				{{-- <x-user-status is-small ago="30 минут назад" /> --}}
			@endif

			@if (is_null($message))
				<div class="user-subscribe-card__age">{{ $user['age'] }}</div>
				<div class="user-subscribe-card__location">{{ $user['location'] }}</div>
			@else
				<div class="user-subscribe-card__message">
					<div class="user-subscribe-card__message__message">{{ $message }}</div>
					<div>
						<x-notification-counter count="1" />
					</div>
				</div>
				<div class="user-subscribe-card__ago">Час назад</div>
			@endif
		</div>

		@if (is_null($message) && $showButton)
			<div class="user-subscribe-card__buttons">
				@if ($isSubscribed)
					<x-button is-block size="small" color="pale" icon="user-minus-solid">Отписаться</x-button>
				@else
					<x-button is-block size="small" color="pale" icon="user-plus-solid">Подписаться</x-button>
				@endif
			</div>
		@endif
	</div>
</a>
