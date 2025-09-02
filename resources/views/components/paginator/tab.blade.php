@props([
    'isSquare'      => false,
    'isActive'      => false,
    'isSelected'    => false,
    'icon'          => null,
])

<a
    {{ $attributes->class([
        'tab',
        'tab_square' => $isSquare,
        'tab_active' => $isActive,
        'tab_selected' => $isSelected
    ])
}}>
    @if ($icon)
        <x-icon :$icon />
    @endif

    @if (trim($slot))
        <span>{{ $slot }}</span>
    @endif
</a>
