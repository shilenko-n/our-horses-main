@if($isInline)
	<span {{ $attributes->class(['user-status', 'user-status_online' => is_null($ago), 'user-status_small' => $isSmall]) }}>
		@if (is_null($ago))
			Сейчас онлайн
		@else
			Заходил {{ $ago }}
		@endif
	</span>
@else
	<div {{ $attributes->class(['user-status', 'user-status_online' => is_null($ago), 'user-status_small' => $isSmall]) }}>
		@if (is_null($ago))
			Сейчас онлайн
		@else
			Заходил {{ $ago }}
		@endif
	</div>
@endif
