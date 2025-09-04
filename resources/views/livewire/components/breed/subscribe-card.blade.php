<div
    @class([
        'breed-subscribe-card',
        'breed-subscribe-card_unsubscribed' => !$isSubscribed && $showButton
    ])
>
    <h4 class="breed-subscribe-card__name">
        <a class="breed-subscribe-card__link" href="#">{{ $horseBreed->name }}</a>
    </h4>
    @if ($showButton)
        <div class="breed-subscribe-card__buttons">
            @if ($isSubscribed)
                <x-button
                    is-block
                    size="small"
                    color="pale"
                    icon="user-minus-solid"
                    wire:click="unsubscribe"
                >Отписаться</x-button>
            @else
                <x-button
                    is-block
                    size="small"
                    color="pale"
                    icon="user-plus-solid"
                    wire:click="subscribe"
                >Подписаться</x-button>
            @endif
        </div>
    @endif
</div>
