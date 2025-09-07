
@extends('layouts.template')

@section('page.content')

    <div class="horses-feed">
        <div class="horses-feed__content">
            <div class="horses-feed__heading">
                <h2 class="horses-feed__title">Мои лошади</h2>
                <x-link
                    class="w-100-p"
                    href="{{route('pages.user.horses.add')}}"
                    button
                    icon="plus-solid"
                >Добавить лошадь</x-link>
            </div>
            <div class="horses-feed__cards pt-0">
                <p class="horses-feed__cards__hint">Перетаскивайте карточки лошадей, чтобы изменить порядок их вывода в своём профиле.</p>
                <div class="horses-feed__cards__cards">
                    @foreach($horses as $horse)
                        <livewire:components.horses.small-card
                            edit-url="/front/pages/horses/edit"
                            href="/front/pages/horses/view"
                            hide-owner="true"
                            is-positioning="true"
                            :horse="$horse"
                            show-button="true"
                            has-edit="true"
                            price="123"
                        />
                    @endforeach
                </div>
            </div>
            <div class="horses-feed__cards">
                <h3 class="horses-feed__cards__title">Заявки на добавление</h3>
                <div class="horses-feed__cards__cards">
                    @foreach($moderatingHorses as $horse)
                        <livewire:components.horses.small-card
                            href="/front/pages/horses/view"
                            hide-badges="true"
                            hide-owner="true"
                            :horse="$horse"
                            price="2345"
                        />
                    @endforeach
{{--                    <x-horse.small-card href="/front/pages/horses/new-moderation" hide-owner :horse="fake()->horse()" show-button has-edit moderation price="{{ fake()->boolean() ? fake()->numberBetween(500000, 5000000) : 0 }}" />--}}
{{--                    <x-horse.small-card href="/front/pages/horses/new-moderation" hide-owner :horse="fake()->horse()" show-button has-edit moderation price="{{ fake()->boolean() ? fake()->numberBetween(500000, 5000000) : 0 }}" />--}}
{{--                    <x-horse.small-card href="/front/pages/horses/new-moderation" hide-owner :horse="fake()->horse()" show-button has-edit is-revision price="{{ fake()->boolean() ? fake()->numberBetween(500000, 5000000) : 0 }}" />--}}
                </div>
            </div>
            <div class="horses-feed__cards">
                <h3 class="horses-feed__cards__title">Черновики</h3>
                <div class="horses-feed__cards__cards">
                    @foreach($draftHorses as $horse)
                        <livewire:components.horses.small-card
                            href="/front/pages/horses/view"
                            hide-badges="true"
                            hide-owner="true"
                            :horse="$horse"
                            price="2345"
                        />
                    @endforeach
                </div>
            </div>
            <div class="horses-feed__cards">
                <h3 class="horses-feed__cards__title">Прежние лошади</h3>
                <div class="horses-feed__cards__cards">
{{--                    <x-horse.small-card href="/front/pages/horses/gone" hide-owner :horse="fake()->horse()" is-subscribed price="{{ fake()->boolean() ? fake()->numberBetween(500000, 5000000) : 0 }}" />--}}
{{--                    <x-horse.small-card href="/front/pages/horses/gone" hide-owner :horse="fake()->horse()" is-subscribed price="{{ fake()->boolean() ? fake()->numberBetween(500000, 5000000) : 0 }}" />--}}
                </div>
            </div>
        </div>
    </div>

@endsection
