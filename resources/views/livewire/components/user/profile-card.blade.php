<div class="profile-card">
{{--    @if ($showCover)--}}
{{--        <img--}}
{{--            class="profile-card__cover"--}}
{{--            src="https://placehold.co/1752x456"--}}
{{--            alt="profile card cover"--}}
{{--        />--}}
{{--    @endif--}}

    <div class="profile-card__content">
        <div class="profile-card__account profile-card__item-phone-show">
            <img
                class="profile-card__photo"
                src="{{ $user->getAvatarUrl() }}"
                alt="{{ $user->name }}"
            />
            <div class="profile-card__name">{{ $user->name }}</div>
        </div>

        <img
            class="profile-card__photo profile-card__item-phone-hide"
            src="{{ $user->getAvatarUrl() }}"
            alt="{{ $user->name }}"
        />

        <div class="profile-card__info">

            <div class="profile-card__username">
                <div class="profile-card__name profile-card__item-phone-hide">{{ $user['name'] }}</div>
                <x-user.status ago="вчера в 12:30" />
            </div>

            @if ($user->description)
                <div class="profile-card__description">{{ $user->description }}</div>
            @endif

            <div class="profile-card__personal">
                <div class="profile-card__age">{{ $user->age ?? 'Возраст не указан' }}</div>

                @if($user->city)
                    <div class="profile-card__location">
                        <x-icon class="profile-card__location-icon" icon="map-marker-alt-solid" />
                        <div>{{ $user->city->name }}</div>
                    </div>
                @endif
            </div>

            <div class="profile-card__buttons">
                @if ($isSelf)
                    <x-link
                        class="btn btn_accent"
                        icon="pencil-alt-solid"
                        href="{{route('pages.user.settings')}}"
                    >Редактировать профиль</x-link>
                @else

                @if($user->isSubscribed(Auth::user()))
                    <x-button
                        class="profile-card__button"
                        icon="user-minus-solid"
                        wire:click="unsubscribe"
                        color="pale"
                    >Отписаться</x-button>
                @else
                    <x-button
                        class="profile-card__button"
                        icon="user-plus-solid"
                        wire:click="subscribe"
                    >Подписаться</x-button>
                @endif



                    <x-button class="profile-card__button" color="pale" icon="comments-solid">Написать</x-button>
                    <div class="dropdown">
                        <x-button class="profile-card__button dropdown__button" color="pale" icon="ellipsis-h-solid" />
                        <div class="dropdown__menu">
                            <button class="dropdown__item" type="button" @click="openModal('complaint_modal')">Пожаловаться</button>
                            {{-- <a class="dropdown__item" href="#">Заблокировать</a> --}}
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
