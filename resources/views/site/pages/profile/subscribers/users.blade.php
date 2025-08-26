@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="subscribers">
		<div class="subscribers__header">
			<x-breadcrumbs :items="[['title' => 'Иван Иванов', 'url' => '/front/pages/profile/user/view']]" />
			<h2 class="subscribers__title">Подписки на людей <span class="subscribers__counter">47</span></h2>
		</div>
		<div class="subscribers__items">
			@for ($i = 0; $i < 24; $i++)
				@if (fake()->boolean())
					<x-user.subscribe-card :user="fake()->human($i)" href="/front/pages/profile/guest/view" show-button is-subscribed />
				@else
					<x-user.subscribe-card :user="fake()->human($i)" href="/front/pages/profile/guest/view" show-button />
				@endif
			@endfor
		</div>

		<div class="subscribers__paginator">
			@include('site.blocks.paginator')
		</div>
	</div>
@stop
