<div class="subscribers__items">

    @foreach($horses as $horse)

        <livewire:components.horses.small-card
            :horse="$horse"
            :show-button="true"
        />

    @endforeach

</div>
