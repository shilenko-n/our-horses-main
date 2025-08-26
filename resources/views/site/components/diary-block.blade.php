<div {{ $attributes->class(['diary-block']) }}>
	<div class="diary-block__actions">
		<div class="diary-block__actions_position">
			<x-button color="pale" size="small" icon="chevron-up-solid" :disabled="$disableUp ?? false" />
			<x-button color="pale" size="small" icon="chevron-down-solid" :disabled="$disableDown ?? false" />
		</div>
		<div class="diary-block__title">{{ $title }}</div>
		<x-button color="pale" size="small" icon="times-light" />
	</div>
	<div class="diary-block__content">
		{{ $slot }}
	</div>
</div>
