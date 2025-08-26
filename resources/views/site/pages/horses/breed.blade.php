@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="horses-breed">
		<div>
			<x-breadcrumbs :items="[['url' => '/front/pages/horses/breeds', 'title' => 'Лошади']]" />
			<h2 class="horses-breed__title">Абиссинская</h2>
			<div class="horses-breed__actions">
				<x-button-tabs size="adaptive" :tabs="[
				    [
				        'name' => 'Все лошади',
				        'url' => '#',
				        'active' => true,
				    ],
				    [
				        'name' => 'В продаже',
				        'url' => '#',
				    ],
				    [
				        'name' => 'В аренде',
				        'url' => '#',
				    ],
				]" />
				<x-button class="w-100-p" icon="user-plus-solid">Подписаться на породу</x-button>
			</div>
		</div>

		<div class="horses-breed__horses">
			@for ($i = 0; $i < 24; $i++)
				<x-horse.small-card :horse="fake()->horse($i + 1)" price="{{ fake()->boolean() ? fake()->numberBetween(500000, 5000000) : 0 }}" />
			@endfor
		</div>

		<div>
			@include('site.blocks.paginator')
		</div>
	</div>
@stop
