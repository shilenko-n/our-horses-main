@extends('site.layout.template-without-footer')

@section('page.title', 'Страница администратора - Редактирование страницы')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="edit-article-page">
		<div class="edit-article-page__header">
			@php
				$breadcrumbs = [ ['title' => 'Статьи', 'url' => '#'], ['title' => 'Реклама', 'url' => '#'] ];
			@endphp
			<x-breadcrumbs :items="$breadcrumbs"></x-breadcrumbs>
			<div class="edit-article-page__header__group">
				<h2>Редактирование статьи</h2>
			</div>
		</div>

		<div class="edit-article-page__content">
			<x-forms.input label="Заголовок" value="Реклама" required />
			<div>
				@php
					$articleArea = '<p>Аккаунт специалиста — это платный статус личного аккаунта, который убирает часть ограничений на сайте, связанных с коммерческой деятельностью. С ним можно писать о своём деле, рассказывать о коммерческих проектах в личном блоге и предлагать другим участникам сообщества свои товары и услуги.</p>
					<p><b>Зачем Аккаунт специалиста нужен? Чем полезен?</b> Описать случаи из практики, показать портфолио работ в блоге, предложить свои товары или услуги в комментариях, дать профессиональные контакты и ссылки в профиле — для всего этого раньше необходимо было создавать бизнес-аккаунт.</p>
					<p>Потому что любая коммерческая деятельность с личных аккаунтов запрещена <a href="#">Правилами сайта.</a></p>
					<p><b>Какие конкретно преимущества даёт?</b> Аккаунт специалиста (Про-аккаунт) позволяет делать всё это с личного аккаунта, не создавая отдельный Аккаунт компании (Бизнес-аккаунт). При желании, можно даже не менять свой аккаунт внешне.</p>
					<ul>
						<li>Иммунитет от бана за коммерцию. На ваши записи, комментарии и профиль нельзя пожаловаться за «ведение коммерции».</li>
						<li>По желанию, можно добавить бирку специализации («Я могу помочь…») на странице профиля и везде под ником вместо машины.</li>
						<li>Никакой рекламы на сайте.</li>
					</ul>';
				@endphp
				<div
					contenteditable="true"
					class="editable-html"
					style="border: 1px solid #ccc; padding: 10px; min-height: 100px;"
				>
					{!! $articleArea !!}
				</div>
				<input type="hidden" name="html_content" id="hiddenHtml">
				<div class="edit-article-page__content__controls">
					<x-button color="pale" icon="bold"></x-button>
					<x-button color="pale" icon="italic"></x-button>
					<x-button color="pale" icon="strike"></x-button>
					<x-button color="pale" icon="link"></x-button>
				</div>
			</div>
			<x-forms.file label="Фотография" hint="До 20 файлов. Максимальный размер каждого файла — 8 MB." />
			<x-forms.flag label="Опубликовать статью" />

			<div class="edit-article-page__content__grid-images">
				<div class="loaded-img">
					<x-button color="pale" icon="times-regular"></x-button>
					<img class="loaded-img__img" src="{{ asset('img/assets/article/admin/photo-d.jpg') }}" alt="">
				</div>
			</div>
			<div class="edit-article-page__content__footer-controls">
				<x-button class="w-100-p" icon="check-solid" size="big" type="submit">Сохранить</x-button>
				<x-button class="w-100-p" link="link" size="big" type="submit">Удалить статью</x-button>
			</div>
		</div>

	</div>
@stop
