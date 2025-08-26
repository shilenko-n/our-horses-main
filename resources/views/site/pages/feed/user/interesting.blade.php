@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="feed__container">
		<div class="feed__heading">
			<h1 class="feed__container-title">Самые интересные посты</h1>
			@php
				$listThemes = [
					"Все темы",
					"Бега",
					"Безопасность",
					"Вестерн",
					"Ветеринария",
					"Видеосюжеты",
					"Вольтижировка",
					"Выбор и покупка лошади",
					"Выездка",
					"Выставки",
					"За границей",
					"Законодательство",
					"История",
					"Конкур",
					"Кормление",
					"Косметика для лошадей",
					"Перевозка",
					"Подбор амуниции",
					"Путешествия",
					"Сделай сам",
					"Скачки",
					"Смешное",
					"Содержание",
					"Соревнования",
					"Строительство",
					"Тренировки",
					"Троеборье",
					"Уход за копытами",
					"Физподготовка всадника",
					"Фотосессии",
				]
			@endphp
			<x-feed-actions :list="$listThemes" />
		</div>

		<div class="feed__content">
			<div class="feed__newsline newsline">
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(1)" :user="fake()->human()" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(2)" :user="fake()->human()" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(3)" :user="fake()->human()" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(4)" :user="fake()->human()" />
				<x-feed-blocks.banner></x-feed-blocks.banner>
			</div>

			<div class="feed__filter">
				<x-right-sidebar-blocks.interesting-themes />
				<x-right-sidebar-blocks.sidebar-banner />
			</div>
		</div>
	</div>

@stop
