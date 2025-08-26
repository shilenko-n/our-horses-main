{{-- blade-formatter-disable --}}
<div
	{{ $attributes->class([
		'mobile-menu-item',
		'mobile-menu-item_small' => $small,
		'mobile-menu-item_active' => $active,
		'mobile-menu-item_multi' => isset($items) && count($items)
	]) }}>

	@if ($icon)
		<x-icon :$icon />
	@endif

	@if (trim($slot))
		<span>{{ $slot }}</span>
	@endif

	@if (!is_null($count))
		<x-notification-counter class="mobile-menu-item__number" :count="$count" />
	@endif

	@if (isset($items) && count($items))
		<div class="mobile-menu-item__menu">
			@foreach ($items as $item)
				<a href="{{ $item['url'] }}">{{ $item['name'] }}</a>
			@endforeach
		</div>
	@endif
</div>
{{-- blade-formatter-enable --}}
