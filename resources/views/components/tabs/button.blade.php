@props([
    'onlyTabs'  => false,
    'tabs'      => [],
    'size'      => null,
])

<div
    {{
        $attributes->class([
            'button-tabs',
            'button-tabs_only-tabs' => $onlyTabs
        ])
    }}
>
    <div class="button-tabs__tabs">
        @foreach ($tabs as $tab)
            <x-tabs.tab
                :is-selected="$tab['active'] ?? false"
                href="{{ $tab['url'] }}"
            >
                {{ $tab['name'] }}
            </x-tabs.tab>
        @endforeach
    </div>
    <div class="button-tabs__select">
        <x-forms.select
            is-dropdown
            :size="$size"
        >
            @foreach ($tabs as $tab)
                <option
                    @checked($tab['active'] ?? false)
                    value="{{ $tab['url'] }}"
                >
                    {{ $tab['name'] }}
                </option>
            @endforeach
        </x-forms.select>
    </div>
</div>
