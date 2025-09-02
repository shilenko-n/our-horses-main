<div class="subscribers__items">

    @php
        $ownSubscriptions = Auth::user()->userSubscriptions;

    @endphp

    @foreach($subscribers as $subscriber)

        <livewire:user.subscribers.subscribe-card
            :user="$subscriber->user"
            :isSubscribed="$ownSubscriptions->contains($subscriber->user)"
        />

    @endforeach

</div>
