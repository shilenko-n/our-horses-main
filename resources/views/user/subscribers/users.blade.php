
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
                Подписки на людей <span class="subscribers__counter">{{$user->userSubscriptions()->count()}}</span>
            </h2>
        </div>
        <livewire:user.subscribers.items :user="$user" />

        <div class="subscribers__paginator">
{{--            @include('site.blocks.paginator')--}}
        </div>
    </div>
@endsection
