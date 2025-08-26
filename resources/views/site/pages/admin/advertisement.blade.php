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
				'url' => '#',
				'active' => true,
			],
			[
				'name' => 'Горизонтальный баннер',
				'url' => '/front/pages/admin/advertisement-horizontal',
			],
			[
				'name' => 'Вытянутый горизонтальный баннер',
				'url' => '/front/pages/admin/advertisement-horizontal-long',
			],
		]" />

		<form action="" class="advertisement-page__form">
			<x-forms.flag label="Показывать баннер на сайте" checked></x-forms.flag>
			<x-forms.file label="Версия под любые устройства, 360×584" hint="В формате JPEG или PNG. Максимальный размер файла — 8 MB." />
			<x-right-sidebar-blocks.sidebar-banner class="img_size-auto" />
			<x-button class="w-100-p" icon="check-solid" size="big" type="submit">Сохранить</x-button>
		</form>

	</div>
@stop
