{{-- blade-formatter-disable --}}
	<div {{ $attributes->class([
		'notice',
		'notice_read' => $isRead
	]) }}>
{{-- blade-formatter-enable --}}
<div class="notice__icon">
	<x-icon :icon="$icon" />
</div>
<div class="notice__content">
	<div class="notice__message">{{ $slot }}</div>
	<div class="notice__timestamp">{{ $showTimestamp }}</div>
</div>
</div>
