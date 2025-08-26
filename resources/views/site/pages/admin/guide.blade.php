@extends('site.layout.template-without-footer')

@section('page.title', 'Страница администратора - Справочники')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="guide-page">
		<div class="guide-page__header">
			<h2>Справочники</h2>
			<x-button-tabs size="adaptive" :tabs="[
			[
				'name' => 'Породы лошадей',
				'url' => '#',
				'active' => true,
			],
			[
				'name' => 'Масти лошадей',
				'url' => '#',
			],
			[
				'name' => 'Специализации лошадей',
				'url' => '#',
			],
			[
				'name' => 'Темы дневников лошадей',
				'url' => '#',
			],
			[
				'name' => 'Темы самого интересного',
				'url' => '#',
			],
			[
				'name' => 'Темы для жалоб',
				'url' => '#',
			],
			[
				'name' => 'Темы обращений в поддержку',
				'url' => '#',
			],
			[
				'name' => 'Страны и города',
				'url' => '#',
			],
		]" />
		</div>

		<div class="guide-page__content">
			@php
				$items = [
					'Арабская',
					'Донская лошадь',
					'Пони',
					'Монгольская лошадь',
					'Абтенайская',
					'Абиссинская',
					'Тяжеловоз',
					'Азорская',
					'Шетлендский пони',
					'Мустанг',
					'Забайкальская',
					'Калмыцкая',
					'Канадская',
					'Ахалтекинская лошадь',
					'Будёновская лошадь',
					'Клейдесдаль',
					'Першерон',
					'Рысак',
					'Англо-норман',
					'Шайр',
					'Авелинская',
					'Кабардинская',
				];
			@endphp
			@foreach($items as $item)
				<x-forms.input value="{{ $item }}" />
			@endforeach

			<div class="guide-page__content__group">
				<x-forms.input value="Кабардинская" />
				<x-button color="pale" icon="times-solid"></x-button>
			</div>

			<x-button color="pale add-inp" icon="plus-solid">Добавить ещё</x-button>

			<div class="guide-page__content__footer">
				<x-button class="w-100-p" icon="check-solid" size="big" type="submit">Сохранить</x-button>
			</div>
		</div>

	</div>
@stop
