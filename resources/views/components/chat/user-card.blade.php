<a href="#" {{ $attributes->class(['chat-user-card', 'chat-user-card_active' =>  $isActive]) }}>
	<img class="chat-user-card__photo" src="{{ $user['photo'] }}" alt="">
	<span class="chat-user-card__wrap">
		<span class="chat-user-card__wrap__name">{{ $user['name'] }}</span>
		@if (fake()->boolean())
			<x-user-status is-small is-inline />
		@endif
		<span class="chat-user-card__wrap__message-block">
			<span class="chat-user-card__wrap__message-block__last-message">{{ $user['last-message'] }}</span>
			@if(!$user['notification-counter'] == null)
				<x-notification-counter count="{{ $user['notification-counter'] }}" />
			@endif
		</span>
		<span class="chat-user-card__wrap__date-message">{{ $user['date-message'] }}</span>
	</span>
</a>
