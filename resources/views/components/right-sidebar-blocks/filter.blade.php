@props([
    'name' => '',
    'title' => '',
])

<x-modal save-content sidebar-content :name="$name">
    <div {{ $attributes->class(['feed-filter']) }}>
        <div class="feed-filter__heading">{{ $title }}</div>
        <div class="feed-filter__fields">
            {{ $slot }}
        </div>
        <div class="feed-filter__buttons">
            <x-button class="feed-filter__button" icon="check-solid">Показать</x-button>
            <x-button class="feed-filter__button" color="pale" icon="times-solid" />
        </div>

        {{ $history ?? null }}
    </div>
</x-modal>
