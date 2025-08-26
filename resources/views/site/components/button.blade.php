{{-- blade-formatter-disable --}}
<button
	{{ $attributes
		->class([
			'btn_link link_' . $color => $link,
			'btn btn_' . $color => !$link,
			'link_icon' => trim($icon) && $link,
			'btn_' . $size => $size,
			'btn_icon' => !trim($slot),
			'w-100 t-align-center' => $isBlock,
			'btn_narrow' => !$link && $isNarrow,
			'btn_bordered' => $hasBorder,
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
</button>
