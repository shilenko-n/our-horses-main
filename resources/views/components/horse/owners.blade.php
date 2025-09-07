<div class="owners">
    @if (!$horse->isDead())
        <div>
            <div class="owners__date">Владелец с 5 ноября 2021</div>
            <div class="owners__user">
                <livewire:user.subscribers.subscribe-card
                    :user="$horse->currentOwner()"
                />
{{--                <x-user.subscribe-card :user="fake()->human(0)" href="/front/pages/profile/user/view" />--}}
            </div>
        </div>
    @endif

    @if($horse->isDead() || $horse->owners()->count() > 1)
            <div>
                <x-button data-owners-toggle color="pale" icon="chevron-down-solid">Показать предыдущих владельцев</x-button>
            </div>
            <div class="owners__previous">
                @if ($horse->isDead())
                    <div>
                        <div class="owners__date">Владелец с 5 ноября 2021 по 07 июня 2023</div>
                        <div class="owners__user">
                            <livewire:user.subscribers.subscribe-card
                                :user="$horse->currentOwner()"
                            />
                        </div>
                    </div>
                @endif
                @foreach($horse->previousOwners as $owner)
                    <div>
                        <div class="owners__date">Владелец с {{$owner->pivot->ownership_start}} по {{$owner->pivot->ownership_end}}</div>
                        <div class="owners__user">
                            <livewire:user.subscribers.subscribe-card
                                :user="$owner"
                            />
                        </div>
                    </div>
                @endforeach
            </div>
    @endif


</div>
