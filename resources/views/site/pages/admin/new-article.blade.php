@extends('site.layout.template-without-footer')

@section('page.title', 'Страница администратора - Новая статья')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="new-article-page">
		<div class="new-article-page__header">
			@php
				$breadcrumbs = [ ['title' => 'Статьи', 'url' => '#'] ];
			@endphp
			<x-breadcrumbs :items="$breadcrumbs"></x-breadcrumbs>
			<div class="new-article-page__header__group">
				<h2>Новая статья</h2>
			</div>
		</div>

		<div class="new-article-page__content">
			<x-forms.input label="Заголовок" required />
			<div>
				<x-forms.textarea rows="20" label="Текст" required />
				<div class="new-article-page__content__controls">
					<x-button color="pale" icon="bold"></x-button>
					<x-button color="pale" icon="italic"></x-button>
					<x-button color="pale" icon="strike"></x-button>
					<x-button color="pale" icon="link"></x-button>
				</div>
			</div>
			<x-forms.file label="Фотография" hint="До 20 файлов. Максимальный размер каждого файла — 8 MB." />
			<x-forms.flag label="Опубликовать статью" />
			<x-button class="w-100-p" icon="check-solid" size="big" type="submit">Сохранить</x-button>
		</div>

	</div>
@stop
