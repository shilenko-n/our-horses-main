<div class="subscribers__items">

    @foreach($horses as $horse)

        <livewire:components.horses.small-card
            :horse="$horse"
            :show-button="true"
            :user="$user"
        />

{{--        <x-horse.small-card--}}
{{--            show-button--}}
{{--            :horse="$horse"--}}
{{--            is-subscribed="{{ fake()->boolean() }}"--}}
{{--            price="123"--}}
{{--        />--}}

    @endforeach

</div>
