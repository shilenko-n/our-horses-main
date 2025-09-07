<div class="owners">
    @if (!$horse->isDead())
        <div>
            <div class="owners__date">Владелец с 5 ноября 2021</div>
            <div class="owners__user">
                <livewire:user.subscribers.subscribe-card
                    :user="\App\Models\User::find(1)"
                    :is-subscribed="true"
                />
{{--                <x-user.subscribe-card :user="fake()->human(0)" href="/front/pages/profile/user/view" />--}}
            </div>
        </div>
    @endif
    <div>
        <x-button data-owners-toggle color="pale" icon="chevron-down-solid">Показать предыдущих владельцев</x-button>
    </div>
    <div class="owners__previous">
        @if ($horse->isDead())
            <div>
                <div class="owners__date">Владелец с 5 ноября 2021 по 07 июня 2023</div>
                <div class="owners__user">
{{--                    <x-user.subscribe-card :user="fake()->human(0)" href="/front/pages/profile/user/view" />--}}
                </div>
            </div>
        @endif
{{--        @foreach()--}}

{{--        @endforeach--}}
        <div>
            <div class="owners__date">Владелец с 15 сентября 2020 по 5 ноября 2021</div>
            <div class="owners__user">
{{--                <x-user.subscribe-card :user="fake()->human(1)" href="/front/pages/profile/guest/view" />--}}
            </div>
        </div>
        <div>
            <div class="owners__date">Владелец с 1 мая 2018 по 14 сентября 2020</div>
            <div class="owners__user">
{{--                <x-user.subscribe-card :user="fake()->human(2)" href="/front/pages/profile/guest/view" />--}}
            </div>
        </div>
    </div>
</div>
