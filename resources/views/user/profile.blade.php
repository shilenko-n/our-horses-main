
@extends('layouts.template')

@section('page.content')

    <x-user.profile-card
        :is-self="$isSelf"
        :user="$user"
    />

    <div class="feed__content">
        <div class="feed__newsline">

            <div class="horse__cards">

                @foreach($user->horses as $horse)
                    <x-feed.horse-card
                        :horse="$horse"
                        show-add-button
                    />
                @endforeach


                <x-button
                    class="prev-horses__button"
                    color="white"
                    is-block
                    icon="chevron-down-solid"
                >Показать прежних лошадей</x-button>
            </div>

            <x-right-sidebar-blocks.sidebar-banner is-mobile />


        </div>

        <div class="feed__filter feed__filter_flex-row">
{{--            <x-right-sidebar-blocks.about-user--}}
{{--                :about="$user->description"--}}
{{--            />--}}
{{--            <x-right-sidebar-blocks.sidebar-banner />--}}
        </div>
    </div>

@endsection
