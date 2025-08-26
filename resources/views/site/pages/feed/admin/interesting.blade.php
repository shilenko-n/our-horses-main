@extends('site.layout.template-without-footer')

@section('page.title', 'Самые интересные посты администратора')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="feed__container">
		<div class="feed__heading">
			<h1 class="feed__container-title">Самые интересные посты</h1>
			<div class="feed__heading__controls">
				<x-feed-actions is-admin modalName="interesting-filter-modal" />
			</div>
		</div>

		<div class="feed__content">
			<div class="feed__newsline">
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(1)" :user="fake()->human()" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(2)" :user="fake()->human()" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(3)" :user="fake()->human()" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(4)" :user="fake()->human()"  />
				<x-feed-blocks.banner></x-feed-blocks.banner>
			</div>

			<div class="feed__filter">
				<x-right-sidebar-blocks.interesting-filter />

				<x-right-sidebar-blocks.sidebar-banner />
			</div>
		</div>
	</div>

	<x-feed-sidebar-modals.interesting-filter />
@stop
