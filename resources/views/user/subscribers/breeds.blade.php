
@extends('layouts.template')

@section('page.content')

    <div class="subscribers">
        <div class="subscribers__header">
            <x-breadcrumbs :items="[
                [
                    'title' => $user->getFullName(),
                    'url' => route('pages.user.profile.show', $user->nickname)
                ]
            ]" />
            <h2 class="subscribers__title">
                Подписки на породы <span class="subscribers__counter">{{$user->horseBreedSubscriptions()->count()}}</span>
            </h2>
        </div>

        <livewire:user.subscribers.breeds
            :horseBreeds="$horseBreedsSubscriptions->toBase()"
        />

        <div class="subscribers__paginator">
            <x-paginator :model="$horseBreedsSubscriptions" />
        </div>

    </div>

@endsection
