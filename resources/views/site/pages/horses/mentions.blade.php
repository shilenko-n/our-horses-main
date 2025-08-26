@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="subscribers">
		<div class="subscribers__header">
			<x-breadcrumbs :items="[['title' => 'Изольда', 'url' => '/front/pages/horses/guest']]" />
			<h2 class="subscribers__title">Упоминания <span class="subscribers__counter">27</span></h2>
			<div class="subscribers__filter-actions">
				<x-button-tabs :tabs="[
				    [
				        'name' => 'Все упоминания',
				        'url' => '#',
				        'active' => true,
				    ],
				    [
				        'name' => 'Блоги пользователей',
				        'url' => '#',
				    ],
				    [
				        'name' => 'Дневники лошадей',
				        'url' => '#',
				    ],
				    [
				        'name' => 'Комментарии',
				        'url' => '#',
				    ],
				]" />
			</div>
		</div>
		<div class="subscribers__items subscribers__items_mentions">
			@php(
    $mentions = [
        ['01', 'Щетина щётки для боков', 'Запись в дневнике <strong>лошади Изольда</strong>'],
        ['02', 'Размышления о лошадках', 'Запись в блоге <strong>Иван Иванов</strong>'],
        ['03', 'Вакцинация', 'Запись в дневнике <strong>лошади Изольда</strong>'],
        ['04', 'Скачки по ЛО', 'Запись в дневнике <strong>лошади Изольда</strong>'],
        ['05', 'Лошади и коренные американцы', 'Запись в блоге <strong>Иван Иванов</strong>'],
        ['04', 'Видел тебя на выставке @Иван Иванов', 'Комментарий от praporapm15 к записи в блоге <strong>Иван Иванов</strong>'],
        ['01', 'Щетина щётки для боков', 'Запись в дневнике <strong>лошади Изольда</strong>'],
        ['02', 'Размышления о лошадках', 'Запись в блоге <strong>Иван Иванов</strong>'],
        ['03', 'Вакцинация', 'Запись в дневнике <strong>лошади Изольда</strong>'],
        ['04', 'Скачки по ЛО', 'Запись в дневнике <strong>лошади Изольда</strong>'],
        ['05', 'Лошади и коренные американцы', 'Запись в блоге <strong>Иван Иванов</strong>'],
        ['04', 'Видел тебя на выставке @Иван Иванов', 'Комментарий от praporapm15 к записи в блоге <strong>Иван Иванов</strong>'],
        ['01', 'Щетина щётки для боков', 'Запись в дневнике <strong>лошади Изольда</strong>'],
        ['02', 'Размышления о лошадках', 'Запись в блоге <strong>Иван Иванов</strong>'],
        ['03', 'Вакцинация', 'Запись в дневнике <strong>лошади Изольда</strong>'],
        ['04', 'Скачки по ЛО', 'Запись в дневнике <strong>лошади Изольда</strong>'],
        ['05', 'Лошади и коренные американцы', 'Запись в блоге <strong>Иван Иванов</strong>'],
        ['04', 'Видел тебя на выставке @Иван Иванов', 'Комментарий от praporapm15 к записи в блоге <strong>Иван Иванов</strong>'],
    ]
)

			@foreach ($mentions as $mention)
				<x-mention photo="{{ asset('img/assets/mentions/' . $mention[0] . '.jpeg') }}" title="{{ $mention[1] }}">
					{!! $mention[2] !!}
				</x-mention>
			@endforeach
		</div>

		<div class="subscribers__paginator">
			@include('site.blocks.paginator')
		</div>
	</div>
@stop
