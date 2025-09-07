<a
    @class([
        'user-subscribe-card',
        'user-subscribe-card_unsubscribed' => !$isSubscribed && !$isSelf
    ])
>
    <div class="user-subscribe-card__photo">
        <img
            alt="user subscriber card"
            src="{{ $user->getAvatarUrl() }}"
{{--            src="https://nashi-koni.studio2i.ru/img/assets/people/01.jpeg"--}}
        />
    </div>
    <div class="user-subscribe-card__personal">
        <div class="user-subscribe-card__info">
            <h4 class="user-subscribe-card__name">{{ $user->name }}</h4>
            <x-user.status is-small ago="30 минут назад" />

{{--            @if (is_null($message))--}}
                <div class="user-subscribe-card__age">{{ $user->age }}</div>
                <div class="user-subscribe-card__location">{{ $user->city->name }}</div>
{{--            @else--}}
{{--                <div class="user-subscribe-card__message">--}}
{{--                    <div class="user-subscribe-card__message__message">{{ $message }}</div>--}}
{{--                    <div>--}}
{{--                        <x-notification-counter count="1" />--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="user-subscribe-card__ago">Час назад</div>--}}
{{--            @endif--}}
        </div>

        @if (!$isSelf && auth()->check())
            <div class="user-subscribe-card__buttons">
                @if ($isSubscribed)
                    <x-button
                        is-block
                        size="small"
                        color="pale"
                        icon="user-minus-solid"
                        wire:click="toggleSubscription"
                    >Отписаться</x-button>
                @else
                    <x-button
                        is-block
                        size="small"
                        color="pale"
                        icon="user-plus-solid"
                        wire:click="toggleSubscription"
                    >Подписаться</x-button>
                @endif
            </div>
        @endif
    </div>
</a>
