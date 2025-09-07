<div class="horse-big-card">

    <div class="horse-big-card__heading">
        <div>
            <div class="horse-big-card__breadcrumbs">
                <x-breadcrumbs
                    :items="[
                        [
                            'url' => route('pages.user.horses.list', $horse->user->nickname),
                            'title' => $isGuest ? $horse->user->name : 'Мои лошади'
                        ]
                    ]"
                />
            </div>
            <h2 class="horse-big-card__title">{{ $horse->name }}</h2>
            <div class="horse-big-card__location">
                <x-icon icon="map-marker-alt-solid" />
                <span>{{$horse->city->country->name}}, {{ $horse->city->name }}</span>
            </div>
        </div>
        <div>
            @auth
                <div class="horse-big-card__actions">
                    @if ($isGuest)
                        <x-button icon="user-plus-solid">Подписаться</x-button>
                        <div class="dropdown">
                            <x-button class="profile-card__button dropdown__button" color="pale" icon="ellipsis-h-solid" />
                            <div class="dropdown__menu">
                                <button class="dropdown__item" type="button" @click="openModal('change-of-owner-modal')">Это моя лошадь</button>
                                <button class="dropdown__item" type="button" @click="openModal('complaint_modal')">Пожаловаться</button>
                            </div>
                        </div>
                    @else
                        <x-button class="w-100-p" icon="plus-solid">Написать в дневник</x-button>
                        <x-link
                            class="w-100-p"
                            :href="$horse->isDead()
                                ? '/front/pages/horses/gone-edit'
                                : '/front/pages/horses/edit'"
                            button
                            icon="pencil-alt-solid"
                            color="pale"
                        >Редактировать</x-link>
                    @endif
                </div>
            @endauth
        </div>
    </div>

    <div class="horse-big-card__info">
        <div class="horse-big-card__slider">
{{--            <x-slider>--}}
{{--                @foreach ($horse['slider'] as $slide)--}}
{{--                    <x-slider.slide>--}}
{{--                        <picture>--}}
{{--                            <source media="(max-width: 768px)" srcset="{{ $slide['p'] }}" />--}}
{{--                            <source media="(min-width: 769px) and (max-width: 1280px)" srcset="{{ $slide['t'] }}" />--}}
{{--                            <img src="{{ $slide['d'] }}">--}}
{{--                        </picture>--}}
{{--                    </x-slider.slide>--}}
{{--                @endforeach--}}
{{--            </x-slider>--}}
        </div>

        <div class="horse-big-card__footer">
            <div class="horse-big-card__stat">
{{--                <x-post-button icon="heart-solid">8</x-post-button>--}}
{{--                <x-post-button icon="comments-solid">12</x-post-button>--}}
{{--                <x-post-button icon="bookmark-solid">2</x-post-button>--}}
{{--                <x-post-button icon="eye-solid" disabled>856</x-post-button>--}}
                <p class="horse-big-card__controls-ago d-none-p">На сайте 5 месяцев</p>
            </div>
            <div class="horse-big-card__badges">
                <p class="horse-big-card__controls-ago d-block-p">На сайте 5 месяцев</p>
                <span class="horse__badge horse__badge_big"><span class="d-none-p">Записи</span> {{ $horse['records'] }}</span>
                <a class="horse__badge horse__badge_big" href="/front/pages/horses/mentions"><span class="d-none-p">Упоминания</span> {{ $horse['mentions'] }}</a>
                <a class="horse__badge horse__badge_big" href="/front/pages/horses/subscribers"><span class="d-none-p">Подписчики</span> {{ $horse['subscribers'] }}</a>
            </div>
        </div>
    </div>

    <div class="horse-big-card__params">
        <div class="horse-big-card__param">
            <div class="horse-big-card__param-name">Порода</div>
            <a
                class="horse-big-card__param-value horse-big-card__param-link"
                href="/front/pages/horses/breed"
            >{{ $horse->horseBreed->name }}</a>
        </div>
        <div class="horse-big-card__param">
            <div class="horse-big-card__param-name">Пол</div>
            <div class="horse-big-card__param-value">{{$horse->gender}}</div>
        </div>
        <div class="horse-big-card__param">
            <div class="horse-big-card__param-name">Масть</div>
            <div class="horse-big-card__param-value">{{$horse->horseColor->name}}</div>
        </div>
        <div class="horse-big-card__param">
            <div class="horse-big-card__param-name">Дата рождения</div>
            <div class="horse-big-card__param-value">{{$horse->birthday}}</div>
        </div>
        <div class="horse-big-card__param">
            <div class="horse-big-card__param-name">Год приобретения</div>
            <div class="horse-big-card__param-value">2020</div>
        </div>
        <div class="horse-big-card__param">
            <div class="horse-big-card__param-name">Отец</div>
            <a class="horse-big-card__param-value horse-big-card__param-link" href="/front/pages/horses/guest">Гакс</a>
        </div>
        <div class="horse-big-card__param">
            <div class="horse-big-card__param-name">Мать</div>
            <a class="horse-big-card__param-value horse-big-card__param-link" href="/front/pages/horses/guest">Гелея</a>
        </div>
        <div class="horse-big-card__param">
            <div class="horse-big-card__param-name">Cпециализация</div>
            <div class="horse-big-card__param-value">{{$horse->horseSpecialization->name}}</div>
        </div>
        <div class="horse-big-card__param">
            <div class="horse-big-card__param-name">Рост в холке</div>
            <div class="horse-big-card__param-value">{{$horse->heightWithers}} см</div>
        </div>
        @if ($horse->isDead())
            <div class="horse-big-card__param">
                <div class="horse-big-card__param-name">Дата смерти</div>
                <div class="horse-big-card__param-value">{{$horse->deathday}}</div>
            </div>
        @endif
    </div>
</div>
