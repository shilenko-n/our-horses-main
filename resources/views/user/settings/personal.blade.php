
@extends('layouts.template')

@section('page.content')

    <div class="settings">
        <div class="personal-settings">
            <div class="personal-settings__header">
{{--                <x-breadcrumbs :items="[['title' => 'Настройки', 'url' => '/front/pages/profile/settings']]" />--}}
                <h2 class="personal-settings__title">Личные данные и безопасность</h2>
            </div>
            <livewire:user.settings.personal />
        </div>
    </div>

@endsection
