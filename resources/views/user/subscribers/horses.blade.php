
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
                Подписки на лошадей <span class="subscribers__counter">{{$user->horseSubscriptions()->count()}}</span>
            </h2>
        </div>
        <livewire:user.subscribers.horses
            :horses="$horsesSubscriptions->toBase()"
            :user="$user"
        />

        <div class="subscribers__paginator">
            <x-paginator :model="$horsesSubscriptions" />
        </div>
    </div>

@endsection
