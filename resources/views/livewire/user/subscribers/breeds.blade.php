<div class="subscribers__items">

    @foreach($horseBreeds as $breed)

        <livewire:components.breed.subscribe-card
            :horse-breed="$breed"
            :show-button="true"
        />

    @endforeach

</div>
