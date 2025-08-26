@extends('site.layout.template')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="main__cover test">
		<div class="main__cover-content">
			<div class="main__cover-content_title">{{ \App\Helpers\setting('main.title') }}</div>
			<div class="main__cover-content_description">{{ \App\Helpers\setting('main.description') }}</div>
			<div class="main__cover-content_search">
				{{-- <label class="input input_primary input_size-medium header__search-input"><input class="input__field input__field_icon-right" type="text" name="search" placeholder="Имя человека, кличка лошади или название товара"><i class="icon icon-search-solid input__icon" aria-hidden="true"></i></label> --}}
				<x-forms.input size="big" icon="search-solid" icon-right placeholder="Имя человека, кличка лошади или название товара" />
			</div>
			<div class="main__cover-content_search_phone">
				{{-- <label class="input input_primary input_size-medium header__search-input"><input class="input__field input__field_icon-right" type="text" name="search" placeholder="Имя человека, кличка лошади или название товара"><i class="icon icon-search-solid input__icon" aria-hidden="true"></i></label> --}}
				<x-forms.input size="small" icon="search-solid" icon-right placeholder="Имя, кличка лошади или товар" />
			</div>
		</div>
	</div>

	<div class="main__content">
		{{-- Дневники лошадей --}}
		<div class="main__hub">
			<div class="main__hub-title">Дневники лошадей</div>
			<div class="main__hub-items">
				@for ($i = 1; $i <= 4; $i++)
					@php($horse = fake()->horse($i))
					<x-horse.small-card href="/front/pages/horses/guest" :horse="$horse" is-subscribed />
				@endfor
			</div>
		</div>

		{{-- Лошади на продаже --}}
		<div class="main__hub">
			<div class="main__hub-title">Лошади на продаже</div>
			<div class="main__hub-items">
				@for ($i = 1; $i <= 4; $i++)
					@php($horse = fake()->horse($i + 4))
					<x-horse.small-card href="/front/pages/horses/guest" :horse="$horse" :price="fake()->numberBetween(1_000_000, 3_000_000)" is-subscribed />
				@endfor
			</div>
		</div>
	</div>
@stop
