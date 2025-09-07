<a
    @class([
        'horse-small-card',
        'horse-small-card_unsubscribed' => !$isSubscribed && !$hasEdit && $showButton
    ])
>
    <div class="horse-small-card__photo">

        @if ($isPositioning)
            <x-button
                class="horse-small-card__move-btn"
                onclick="event.preventDefault()"
                size="small"
                color="pale"
                icon="move-solid"
            />
        @endif

        <picture>
            <img class="horse-small-card__image" src="https://nashi-koni.studio2i.ru/img/assets/horses/d/03.jpeg" alt="">
            {{--            <source media="(max-width: 768px)" srcset="{{ $horse['photo']['p'] }}">--}}
            {{--            <source media="(min-width: 769px) and (max-width: 1280px)" srcset="{{ $horse['photo']['t'] }}">--}}
            {{--            <source media="(min-width: 1281px) and (max-width: 1600px)" srcset="{{ $horse['photo']['l'] }}">--}}
            {{--            <img class="horse-small-card__image" src="{{ $horse['photo']['d'] }}" alt="">--}}
        </picture>

        @if ($price)
            <div class="horse-small-card__price">{{ format_price($price) }}</div>
        @endif
    </div>


    <div class="horse-small-card__content">
        <div class="horse-small-card__info">
            <div class="horse-small-card__horse-name">
                <h4>{{ $horse->name }}</h4>
                @if (!$hideBadges && !$isRevision && !$horse->moderating)
                    <div class="horse-small-card__badges">
                        <div class="horse__badge">{{ 123 }}</div>
                        <div class="horse__badge">{{ 456 }}</div>
                    </div>
                @endif

                @if ($horse->moderating)
                    <span class="horse-small-card__status horse-small-card__status_moderation">На модерации</span>
                @elseif ($isRevision)
                    <span class="horse-small-card__status horse-small-card__status_is-revision">Требуется доработка</span>
                @endif

            </div>

            @if (!$horse->moderating && !$isRevision && !$hideOwner)
                <div class="horse-small-card__user">
                    <div class="horse-small-card__user-name">{{ $horse->currentOwner()->name }}</div>
                    <div class="horse-small-card__user-location">{{ $horse->location }}</div>
                </div>
            @endif


        </div>

        @if (!$horse->moderating && !$isRevision && $showButton)
            <div class="horse-small-card__buttons">
                @if ($isSubscribed && !$hasEdit)
                    <x-button
                        is-block
                        size="small"
                        wire:click="unsubscribe"
                        color="pale"
                        icon="user-minus-solid"
                    >Отписаться</x-button>
                @elseif (!$isSubscribed && !$hasEdit)
                    <x-button
                        is-block
                        size="small"
                        wire:click="subscribe"
                        color="pale"
                        icon="user-plus-solid"
                    >Подписаться</x-button>
                @elseif($hasEdit)
                    <x-button
                        is-block
                        size="small"
                        onclick="event.preventDefault();window.location.replace('{{ $editUrl }}');"
                        color="pale"
                        icon="pencil-alt-solid"
                    >Редактировать</x-button>
                @endif
            </div>
        @endif

    </div>
</a>
