@props([
    'count' => 0,
])

<span {{ $attributes->class(['notification-counter']) }}>
    {{ $count }}
</span>
