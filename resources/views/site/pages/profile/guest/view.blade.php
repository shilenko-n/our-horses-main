@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<x-user.profile-card :user="fake()->human(1)" />

	<div class="feed__content">
		<div class="feed__newsline">
			<div class="horse__cards">
				<x-feed-blocks.horse-card :horse="fake()->horse(1)" />
				<x-feed-blocks.horse-card :horse="fake()->horse(2)" />
				<x-feed-blocks.horse-card :horse="fake()->horse(3)" />

				<x-button class="prev-horses__button" color="white" is-block icon="chevron-down-solid">Показать прежних лошадей</x-button>
			</div>

			<x-feed-blocks.feed-with-title class="prev-horses__block" title="Прежние лошади">
				<x-feed-blocks.horse-card :horse="fake()->horse(4)" />
				<x-feed-blocks.horse-card :horse="fake()->horse(5)" />
				<x-feed-blocks.horse-card :horse="fake()->horse(6)" />
			</x-feed-blocks.feed-with-title>

			<x-right-sidebar-blocks.sidebar-banner is-mobile />

			<div class="profile-posts">
				<div class="profile-posts__header">
					<div class="profile-posts__header__header">
						{{-- <x-breadcrumbs :items="[['title' => 'Мои лошади', 'url' => '#'], ['title' => 'Изольда', 'url' => '#']]" /> --}}
						<h2 class="profile-posts__header__title">Дневники <span class="profile-posts__header__counter">27</span></h2>
					</div>
					<div class="profile-posts__header__actions">
						<div class="profile-posts__header__filter-actions">
							<x-button-tabs :tabs="[
							    [
							        'name' => 'С конца',
							        'url' => '#',
							        'active' => true,
							    ],
							    [
							        'name' => 'С начала',
							        'url' => '#',
							    ],
							    [
							        'name' => 'По лайкам',
							        'url' => '#',
							    ],
							]" />
						</div>
					</div>
				</div>
				@include('site.blocks.paginator')

				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(4)" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(5)" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(6)" />

				@include('site.blocks.paginator')

				<x-feed-blocks.banner />
			</div>

		</div>
		<div class="feed__filter feed__filter_flex-row">
			<x-right-sidebar-blocks.about-user guest about="Меня зовут Пётр Петров, и я любитель всего, что связано с лошадями. Являюсь успешным коневодом. Свободное время мне нравится проводить время на свежем воздухе и читать научно-фантастические романы." />

			<x-right-sidebar-blocks.sidebar-banner />
		</div>
	</div>
@stop
