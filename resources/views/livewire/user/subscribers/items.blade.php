<div>
    <div class="subscribers__items">

        @foreach($users as $subscriber)
            <livewire:user.subscribers.subscribe-card
                :user="$subscriber"
                :is-subscribed="$subscribers->contains($subscriber)"
            />
        @endforeach

    </div>
</div>
