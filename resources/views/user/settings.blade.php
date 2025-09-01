
@extends('layouts.template')

@section('page.content')
    <div class="settings">
        <div class="settings__block">
            <h2 class="settbings__title">Настройки</h2>
            <div class="settings__items">
                <x-link
                    class="settings__item"
                    icon="user-shield-solid"
                    href="{{route('pages.user.settings.personal')}}"
                >Личные данные и безопасность</x-link>
                <x-link class="settings__item" icon="coin-solid" href="/front/pages/profile/settings/payments">Оплата и баланс</x-link>
            </div>
        </div>
        <div class="settings__block">
            <h2 class="settbings__title">Подписки</h2>
            <div class="settings__items">
                <x-link class="settings__item" icon="horse-head-solid" href="/front/pages/profile/subscribers/horses">Лошади</x-link>
                <x-link class="settings__item" icon="users-solid" href="/front/pages/profile/subscribers/users">Люди</x-link>
                <x-link class="settings__item" icon="pegas-solid" href="/front/pages/profile/subscribers/breeds">Породы</x-link>
            </div>
        </div>
    </div>
@endsection
