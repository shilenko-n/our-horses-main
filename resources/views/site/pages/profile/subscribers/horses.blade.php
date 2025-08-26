@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="subscribers">
		<div class="subscribers__header">
			<x-breadcrumbs :items="[['title' => 'Иван Иванов', 'url' => '/front/pages/profile/user/view']]" />
			<h2 class="subscribers__title">Подписки на лошадей <span class="subscribers__counter">57</span></h2>
		</div>
		<div class="subscribers__items su bscribers__items_horse">
			@for ($i = 0; $i < 24; $i++)
				<x-horse.small-card show-button :horse="fake()->horse($i + 1)" is-subscribed="{{ fake()->boolean() }}" price="{{ fake()->boolean() ? fake()->numberBetween(500000, 5000000) : 0 }}" />
			@endfor
		</div>

		<div class="subscribers__paginator">
			@include('site.blocks.paginator')
		</div>
	</div>
	</div>
@stop
