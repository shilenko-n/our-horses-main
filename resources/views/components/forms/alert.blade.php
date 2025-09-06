@props([
    'type' => '',
    'icon' => null,
    'url' => null,
])

<div {{ $attributes->class(['alert', 'alert_' . $type]) }}>
    @if ($icon ?? false)
        <div class="alert__icon">
            <x-icon icon="{{ $icon }}" />
        </div>
    @endif
    <div class="alert__body">
        <span class="alert__message">{{ $slot }}</span>
        @if ($url)
            <div class="alert__buttons">
                <x-link class="w-100-p" href="{{ $url }}" color="pale" size="small" icon="chevron-right-solid" button>Страница лошади</x-link>
            </div>
        @endif
    </div>
</div>
