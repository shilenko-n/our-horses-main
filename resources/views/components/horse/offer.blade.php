@props([
    'horse'     => null,
    'isGuest'   => true,
])

<div class="horse-advertisement">
    <div class="horse-advertisement__content">
        <h3 class="horse-advertisement__heading">Продаётся в г. Санкт-Петербург</h3>
        <div class="horse-advertisement__prices">
            <div class="horse-advertisement__prices-prices">
                <div class="horse-advertisement__price">1 500 000 ₽</div>
                <div class="horse-advertisement__price">20 259 $</div>
                <div class="horse-advertisement__price">18 956 €</div>
                <div class="horse-advertisement__price">1 245 600 Br</div>
                <div class="horse-advertisement__price">1 021 ₴</div>
            </div>
            <div class="horse-advertisement__prices-hint">Цены указаны по курсу ЦБ</div>
        </div>
        <div class="horse-advertisement__about-horse">Порода арабская, кобыла, 2008 г.р., специализация конкур</div>
        <p class="horse-advertisement__text">Доброжелательная, спокойная кобыла. Никогда не укусит и не ударит, безопасна, любит детей. Обследована, здоровая, без вредных привычек, психика отличная. Кобыла-учитель, идеально подойдёт для начинающих, в конкуре прыгает из любых положений, прощает ошибки, сама очень любит прыгать.</p>
    </div>
    @auth
        <div class="horse-advertisement__actions">
            @if ($isGuest)
                <x-button class="w-100-p" icon="envelope-solid">Написать продавцу</x-button>
                <x-button class="w-100-p" @click="openModal('contant-sale-modal')" color="white" icon="mobile-alt-solid">Показать контакты</x-button>
            @else
                <x-button class="w-100-p" icon="vk">Поделиться во Вконтакте</x-button>
            @endif
        </div>
    @endauth
</div>
