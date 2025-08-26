@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="subscribers subscribers_breed">
		<div class="subscribers__header">
			<x-breadcrumbs :items="[['title' => 'Иван Иванов', 'url' => '/front/pages/profile/user/view']]" />
			<h2 class="subscribers__title">Подписки на породы <span class="subscribers__counter">5</span></h2>
		</div>
		<div class="subscribers__items subscribers__items_breed">
			@php($breeds = ['Абиссинская', 'Ахалтекинская', 'Албанская', 'Алтайская', 'Американская', 'Андалузская', 'Арабская', 'Австралийская', 'Булонская', 'Бразильская', 'Британская', 'Датунская', 'Калмыкская', 'Карачаевская', 'Карабаир', 'Кигерский мустанг', 'Курдская ', 'Латвийская', 'Лосинская', 'Новокиргиз', 'Орловский рысак', 'Меренская', 'Мессара', 'Пампийская', 'Русская верховая', 'Русский рысак', 'Тавдинская', 'Татарская', 'Финская', 'Фризская', 'Шагия', 'Якутская'])
			@foreach ($breeds as $breed)
				@if (fake()->boolean(90))
					<x-breed.subscribe-card show-button name="{{ $breed }}" is-subscribed />
				@else
					<x-breed.subscribe-card show-button name="{{ $breed }}" />
				@endif
			@endforeach
		</div>

		<div class="subscribers__paginator">
			@include('site.blocks.paginator')
		</div>
	</div>
@stop
