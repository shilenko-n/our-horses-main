@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<x-user.profile-card is-self :user="fake()->human(0)" />

	<div class="feed__content">
		<div class="feed__newsline">
			<div class="horse__cards">
				<x-feed-blocks.horse-card :horse="fake()->horse(1)" show-add-button />
				<x-feed-blocks.horse-card :horse="fake()->horse(2)" show-add-button />
				<x-feed-blocks.horse-card :horse="fake()->horse(3)" show-add-button />

				<x-button class="prev-horses__button" color="white" is-block icon="chevron-down-solid">Показать прежних лошадей</x-button>
			</div>

			<x-right-sidebar-blocks.sidebar-banner is-mobile />

			<x-feed-blocks.feed-with-title class="prev-horses__block" title="Прежние лошади">
				<x-feed-blocks.horse-card :horse="fake()->horse(4)" />
				<x-feed-blocks.horse-card :horse="fake()->horse(5)" />
				<x-feed-blocks.horse-card :horse="fake()->horse(6)" />
			</x-feed-blocks.feed-with-title>

			<div class="profile-posts">
				<div class="profile-posts__header">
					<div class="profile-posts__header__header">
						{{-- <x-breadcrumbs :items="[['title' => 'Мои лошади', 'url' => '/front/pages/profile/user/horses'], ['title' => 'Изольда', 'url' => '#']]" /> --}}
						<h2 class="profile-posts__header__title">Личный блог <span class="profile-posts__header__counter">41</span></h2>
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
						<div class="profile-posts__header__buttons">
							<x-link href="/front/pages/blog/create-form" button icon="plus-solid">Написать в блог</x-link>
						</div>
					</div>
				</div>
				@include('site.blocks.paginator')

				<x-feed-blocks.post-card href="/front/pages/blog/post-view" :post="fake()->post(1)" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-view" :post="fake()->post(2)" alert-message="Пост не опубликован и виден только вам" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-view" :post="fake()->post(3)" />

				@include('site.blocks.paginator')

				<x-feed-blocks.banner />
			</div>
		</div>
		<div class="feed__filter feed__filter_flex-row">
			<x-right-sidebar-blocks.about-user about="Меня зовут Иван Иванов, я из Питера. Моё имя и фамилия — не шутка, ведь я ещё и Иванов Иван Иванович. И я не один такой, у меня в школе трудовика также звали." />
			<x-right-sidebar-blocks.sidebar-banner />
		</div>
	</div>
@stop
