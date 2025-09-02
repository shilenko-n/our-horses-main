<div class="subscribers__items">


    @foreach($users as $subscriber)

        <livewire:user.subscribers.subscribe-card
            :user="$subscriber->user"
            :me="$user"
            :isSubscribed="$ownSubscriptions->contains('user_id', $subscriber->user->id)"
        />

    @endforeach

</div>
