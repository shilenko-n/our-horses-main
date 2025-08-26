@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="feed__container horse-profile">
		<div class="horse-profile__information">
			<x-horse.big-card :horse="fake()->horse(4)" />
			<x-horse.advertisement />

			<div class="horse-profile-about">
				<div class="horse-profile-about__content">
					<h3>Про мою лошадь</h3>
					<p>Лошади — это удивительно красивые животные. Их силе и грации могут позавидовать многие представители животного мира. Не удивительно, почему их так любят многие люди. Более того, именно эти животные вместе с человеком творили историю. Однако, что мы знаем интересного об этих животных?</p>
					<p>Практически в каждой развитой стране есть отдельный отряд полиции на лошадях — конная полиция. Это очень удобно и маневренно в тех местах, куда машина или мотоцикл не может проехать. Например, такие патрули всегда охраняют порядок в парках и зонах отдыха, на городских улицах и загруженных транспортом проспектах. Первые полицейские лошади появились еще в XVII веке, а первая конная полиция организована в 1805 году. Сначала она существовала лишь в Англии, а затем опыт переняла Америка и Австралия, Россия.</p>
				</div>
				<div class="horse-profile-about__owners">
					<x-user.owners />
				</div>
			</div>

			<div class="horse-profile__share">
				<x-share />
			</div>
		</div>

		<div class="horse-profile__diary">
			<div class="horse-profile-diary__header">
				<h2>Дневник <span>57</span></h2>
				<div class="horse-profile-diary__controls">
					<div class="horse-profile-diary__tabs">
						<x-button-tabs :tabs="[
						    [
						        'name' => 'По теме',
						        'url' => '#',
						        'active' => true,
						    ],
						    [
						        'name' => 'По дате',
						        'url' => '#',
						    ],
						    [
						        'name' => 'По лайкам',
						        'url' => '#',
						    ],
						]" />
					</div>
					<x-link class="w-100-p" href="/front/pages/diary/create-form" button icon="plus-solid">Написать в дневник</x-link>
				</div>
			</div>
			<div class="horse-profile-diary__block">
				<h3>Соревнования</h3>
				@for ($i = 0; $i < 2; $i++)
					<x-post.small-card href="/front/pages/diary/post-view" :post="fake()->post()" category="Соревнования" />
				@endfor
			</div>
			<div class="horse-profile-diary__block">
				<h3>Здоровье</h3>
				@for ($i = 0; $i < 2; $i++)
					<x-post.small-card href="/front/pages/diary/post-view" :post="fake()->post()" category="Здоровье" />
				@endfor
			</div>
			<div class="horse-profile-diary__buttons">
				<x-link is-block href="/front/pages/diary/view" button size="big" color="pale" icon="chevron-right-solid">Показать все записи</x-link>
			</div>
		</div>

		@include('site.blocks.comments')
	</div>
@stop
