<div class="horses-breeds">
    <h2>Лошади <span class="c-hint">{{$allCount}}</span></h2>
    <div class="horses-breeds__list">
        @foreach ($breeds as $index => $breed)
            <livewire:components.breed.subscribe-card
                :horse-breed="$breed"
                wire:key="{{\Str::random()}}"
            />

        @endforeach
    </div>

    @if(count($breeds) < $allCount)
        <x-button
            color="pale"
            is-block
            size="big"
            icon="chevron-down-solid"
            wire:click="loadMore"
        >Показать все породы</x-button>
    @endif

</div>
