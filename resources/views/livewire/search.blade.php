<div>
    <form wire:submit.prevent="submitSearch" class="search-page__form">
        <x-forms.input type="text" size="big" label="Что ищем?" wire:model="search" required />
        <x-forms.select size="big" label="Раздел" wire:model="subject">
            <option value="0" selected>Все разделы</option>
            <option value="1">Люди</option>
            <option value="2">Лошади</option>
            <option value="3">Новости</option>
        </x-forms.select>
        <x-button class="w-100-p" icon="search-solid" size="big" type="submit">Найти</x-button>
    </form>

     <!-- Вывод по поиску -->
     @if ($showSearch)
        <div class="search-page__result">
			<!-- Человек -->
			@php $person = fake()->people() @endphp
			<x-site.search-card :data="$person" />

			<!-- Лошади -->
			@for ($i = 0; $i < 2; $i++)
				@php $horse = fake()->horses() @endphp
				<x-site.search-card :data="$horse" />
			@endfor

			<!-- Блог -->
			@php $blog = fake()->blog() @endphp
			<x-site.search-card :data="$blog" />

			<!-- Дневник -->
			@php $diary = fake()->diary() @endphp
			<x-site.search-card :data="$diary" />
        </div>
        @include('site.blocks.paginator')
    @endif

</div>
