
@extends('layouts.app')


@section('page.content')

    <div class="main__cover">
        <div class="main__cover-content">
            <div class="main__cover-content_title">{{ setting('page.home.title') }}</div>
            <div class="main__cover-content_description">{{ setting('page.home.description') }}</div>

            <div class="main__cover-content_search">
                <x-forms.input size="big" icon="search-solid" icon-right placeholder="Имя человека, кличка лошади или название товара" />
            </div>

            <div class="main__cover-content_search_phone">
                <x-forms.input size="small" icon="search-solid" icon-right placeholder="Имя, кличка лошади или товар" />
            </div>

        </div>
    </div>


    <div class="main__content">

        {{-- Дневники лошадей --}}
        <div class="main__hub">
            <div class="main__hub-title">Дневники лошадей</div>
            <div class="main__hub-items">

                @foreach($popularHorses as $horse)

                    <livewire:components.horses.small-card
                        :horse="$horse"
                    />

{{--                    <x-horse.small-card--}}
{{--                        href="/front/pages/horses/guest"--}}
{{--                        :horse="$horse"--}}
{{--                        is-subscribed--}}
{{--                    />--}}

                @endforeach

            </div>
        </div>

        {{-- Лошади на продаже --}}
        <div class="main__hub">
            <div class="main__hub-title">Лошади на продаже</div>
            <div class="main__hub-items">

                @foreach($offers as $offer)
                    <livewire:components.horses.small-card
                        :horse="$offer->horse"
                        :price="$offer->price"
                    />
                @endforeach
            </div>
        </div>

    </div>

@endsection
