@props([
    'active' => false,
    'icon' => '',
])

<button
    {{
        $attributes->class([
            'post-button', 'post-button_active' => $active
        ])
    }}>

    @if ($icon)
        <x-icon :$icon />
    @endif

    @if (trim($slot) || $slot == '0')
        <span>{{ $slot }}</span>
    @endif
</button>
