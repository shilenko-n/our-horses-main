@extends('site.layout.template-without-footer')

@section('page.title', 'Страница администратора - Хаб статей')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="article-hub-page">
		<div class="article-hub-page__header">
			<h2>Статьи</h2>
			<x-link href="/front/pages/admin/new-article" class="w-100-p" button icon="plus-solid">Добавить статью</x-link>
		</div>

		<div class="article-hub-page__content">
			@php
			$articles = [
				[
					'name' => 'Политика конфиденциальности',
					'public' => true
				],
				[
					'name' => 'Пользовательское соглашение',
					'public' => true
				],
				[
					'name' => 'Реклама',
					'public' => false
				],
			]
			@endphp
			@foreach($articles as $article)
				<div class="article-hub-item">
					<span class="article-hub-item__header">{{ $article['name'] }}</span>
					@if(!$article['public'])
						<div class="article-hub-item__status"><x-icon icon="exclamation-triangle-solid"></x-icon>Статья неопубликована</div>
					@endif
					<x-link href="/front/pages/admin/edit-article" button color="pale" icon="pencil-alt-solid">Редактировать</x-link>
				</div>
			@endforeach
		</div>

	</div>
@stop
