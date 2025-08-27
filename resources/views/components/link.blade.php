@props([
    'color' => 'accent',
    'icon'  => null,
    'size'  => null,
])

@php
    $button     = $attributes->has('button');

    $isBlock    = $attributes->has('is-block');
    $isNarrow   = $attributes->has('is-narrow');
    $iconRight  = $attributes->has('icon-right');
@endphp

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
