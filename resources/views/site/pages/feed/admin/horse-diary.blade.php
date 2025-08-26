@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')

	<div class="feed__container">
		<div class="feed__heading">
			<h1 class="feed__container-title">Дневники лошадей</h1>
			<x-feed-actions :onlyFilter="true" modalName="horse-diary-modal" />
		</div>

		<div class="feed__content">
			<div class="feed__newsline">
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(4)" :user="fake()->human()" :newsLine="true" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(5)" :user="fake()->human()" :newsLine="true" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(6)" :user="fake()->human()" :newsLine="true" />
				<x-feed-blocks.banner></x-feed-blocks.banner>
				<x-feed-blocks.feed-with-title title="Встречайте новеньких" :isGrid="true">
					@for ($i = 1; $i <= 4; $i++)
						@php($horse = fake()->horse($i))
						<x-horse.small-card href="/front/pages/horses/guest" :horse="$horse" is-subscribed />
					@endfor
				</x-feed-blocks.feed-with-title>
			</div>

			<div class="feed__filter">
				<x-right-sidebar-blocks.horse-diary />

				<x-right-sidebar-blocks.sidebar-banner />
			</div>
		</div>
	</div>

	<x-feed-sidebar-modals.horse-diary />
@stop
