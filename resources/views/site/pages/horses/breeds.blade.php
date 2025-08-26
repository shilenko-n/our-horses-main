@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="horses-breeds">
		<h2>Лошади <span class="c-hint">112</span></h2>
		<div class="horses-breeds__list">
			@php($breeds = ['Абиссинская', 'Ахалтекинская', 'Албанская', 'Алтайская', 'Американская', 'Андалузская', 'Арабская', 'Австралийская', 'Булонская', 'Бразильская', 'Британская', 'Датунская', 'Калмыкская', 'Карачаевская', 'Карабаир', 'Кигерский мустанг', 'Курдская ', 'Латвийская', 'Лосинская', 'Новокиргиз', 'Орловский рысак', 'Меренская', 'Мессара', 'Пампийская', 'Русская верховая', 'Русский рысак', 'Тавдинская', 'Татарская', 'Финская', 'Фризская', 'Шагия', 'Якутская'])
			@foreach ($breeds as $breed)
				<x-breed.subscribe-card href="/front/pages/horses/breed" name="{{ $breed }}" />
			@endforeach
		</div>
		<x-button color="pale" is-block size="big" icon="chevron-down-solid">Показать все породы</x-button>
	</div>
@stop
