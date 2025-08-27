@props([
    'color' => 'primary',
    'type'  => 'checkbox',
    'label' => ''
])

<label
    {{
    $attributes
        ->merge(['id' => null])
        ->class([
            'flag flag_' . $color,
            'flag_disabled' => $attributes->has('disabled'),
        ])
        ->filter(fn ($value, $key) => in_array($key, ['id', 'class']))
    }}
>
    <input
        type="{{ $type }}"
        {{ $attributes->filter(fn ($value, $key) => !in_array($key, ['id', 'class'])) }}
    >
    <span class="flag__label">
		@if ($label)
            {{ $label }}
        @else
            {{ $slot }}
        @endif
	</span>
</label>
