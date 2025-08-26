{{-- blade-formatter-disable --}}
<a
	{{ $attributes
		->class([
			'link link_' . $color => !$button,
			'btn btn_' . $color => $button,
			'link_icon' => trim($icon),
			'btn_' . $size => $size,
			'btn_icon' => !trim($slot),
			'w-100 t-align-center' => $isBlock,
			'btn_narrow' => $button && $isNarrow,
			])
		}}
>
{{-- blade-formatter-enable --}}
	@if ($icon && !$iconRight)
		<x-icon :$icon />
	@endif

	@if (trim($slot))
    	<span>{{ $slot }}</span>
	@endif

	@if ($icon && $iconRight)
		<x-icon :$icon />
	@endif
</a>
