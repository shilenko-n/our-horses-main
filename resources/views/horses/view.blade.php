
@extends('layouts.template')

@section('page.content')

    <div class="feed__container horse-profile">
        <div class="horse-profile__information">
            <livewire:components.horses.big-card
                :horse="$horse"
            />
            @if($offer)
                <x-horse.offer
                    :horse="$horse"
                    :is-guest="$horse->isOwnedByAuth()"
                    :offer="$offer"
                />
            @endif

            <div class="horse-profile-about">
                <div class="horse-profile-about__content">
                    <h3>Про мою лошадь</h3>
                    <p>{{$horse->description}}</p>
                </div>
                <div class="horse-profile-about__owners">
                    <x-horse.owners
                        :horse="$horse"
                    />
                </div>
            </div>

            <div class="horse-profile__share">
                <x-share />
            </div>
        </div>

        <div class="horse-profile__diary">
            <div class="horse-profile-diary__header">
                <h2>Дневник <span>57</span></h2>
                <div class="horse-profile-diary__controls">
                    <div class="horse-profile-diary__tabs">
{{--                        <x-button-tabs :tabs="[--}}
{{--						    [--}}
{{--						        'name' => 'По теме',--}}
{{--						        'url' => '#',--}}
{{--						        'active' => true,--}}
{{--						    ],--}}
{{--						    [--}}
{{--						        'name' => 'По дате',--}}
{{--						        'url' => '#',--}}
{{--						    ],--}}
{{--						    [--}}
{{--						        'name' => 'По лайкам',--}}
{{--						        'url' => '#',--}}
{{--						    ],--}}
{{--						]" />--}}
                    </div>
                    @if($horse->isCurrentOwner(Auth::user()))
                        <x-link
                            class="w-100-p"
                            href="{{route('pages.horse.diary.create', $horse->id)}}"
                            button
                            icon="plus-solid"
                        >Написать в дневник</x-link>
                    @endif
                </div>
            </div>
            <div class="horse-profile-diary__block">
                <h3>Соревнования</h3>
{{--                @for ($i = 0; $i < 2; $i++)--}}
{{--                    <x-post.small-card href="/front/pages/diary/post-view" :post="fake()->post()" category="Соревнования" />--}}
{{--                @endfor--}}
            </div>
            <div class="horse-profile-diary__block">
                <h3>Здоровье</h3>
{{--                @for ($i = 0; $i < 2; $i++)--}}
{{--                    <x-post.small-card href="/front/pages/diary/post-view" :post="fake()->post()" category="Здоровье" />--}}
{{--                @endfor--}}
            </div>
            <div class="horse-profile-diary__buttons">
                <x-link is-block href="/front/pages/diary/view" button size="big" color="pale" icon="chevron-right-solid">Показать все записи</x-link>
            </div>
        </div>

{{--        @include('site.blocks.comments')--}}
    </div>

@endsection
