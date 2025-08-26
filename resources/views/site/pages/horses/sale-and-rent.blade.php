@extends('site.layout.template-without-footer')

@section('page.title', 'Продажа и аренда')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="sale-rent">
		@php
			$breadcrumbs = [
				[
					"title" => "Мои лошади",
					"url" => "#"
				],
				[
					"title" => "Изольда",
					"url" => "#"
				]
			]
		@endphp
		<div class="sale-rent__header">
			<x-breadcrumbs :items="$breadcrumbs" />
			<h2>Редактирование</h2>

			<div class="sale-rent__tabs">
				<x-button color="white" bordered>Информация о лошади</x-button>
				<x-button class="selected" color="white" bordered>Продажа и аренда</x-button>
			</div>

			<div class="sale-rent__status"><x-icon icon="exclamation-triangle-solid"></x-icon>Истёк срок размещения объявления о продаже. Вы можете продлить его на месяц, чтобы оно снова стало доступным для пользователей</div>
			<p>Объявление о продаже / аренде будет размещено на странице лошади. Потенциальные покупатели смогут видеть вашу лошадь в разделе «Купить лошадь».</p>
		</div>

		@livewire('components.sale-and-rent-form')


	</div>
@stop
