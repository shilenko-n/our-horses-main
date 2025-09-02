<div class="subscribers__items">

    @foreach($user->userSubscriptions as $subscriber)

        <livewire:user.subscribers.subscribe-card
            :user="$subscriber"
            :isSubscribed="$subscribers->contains($subscriber)"
        />

    @endforeach

</div>
