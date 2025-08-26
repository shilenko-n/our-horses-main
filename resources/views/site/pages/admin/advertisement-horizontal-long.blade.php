@extends('site.layout.template-without-footer')

@section('page.title', 'Страница администратора - Реклама')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="advertisement-page">
		<h2 class="advertisement-page__title">Реклама</h2>

		<x-button-tabs size="adaptive" :tabs="[
			[
				'name' => 'Вертикальный баннер',
				'url' => '/front/pages/admin/advertisement',
			],
			[
				'name' => 'Горизонтальный баннер',
				'url' => '/front/pages/admin/advertisement-horizontal',
			],
			[
				'name' => 'Вытянутый горизонтальный баннер',
				'url' => '#',
				'active' => true,
			],
		]" />

		<form action="" class="advertisement-page__form">
			<x-forms.flag label="Показывать баннер на сайте" checked></x-forms.flag>
			<x-forms.file label="Версия для компьютеров и планшетов, 1114×276" hint="В формате JPEG или PNG. Максимальный размер файла — 8 MB." />
			<img src="{{ asset('/img/assets/banners/header/l.png') }}" alt="" style="width: auto; max-width: 1114rem; height: auto;">
			<x-forms.file label="Версия для смартфонов, 768×368" hint="В формате JPEG или PNG. Максимальный размер файла — 8 MB." />
			<img src="{{ asset('/img/assets/banners/header/t.png') }}" alt="" style="width: auto; max-width: 768rem; height: auto;">
			<x-button class="w-100-p" icon="check-solid" size="big" type="submit">Сохранить</x-button>
		</form>

	</div>
@stop
