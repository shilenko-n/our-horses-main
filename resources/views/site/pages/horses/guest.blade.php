@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="horse-profile">
		<div class="horse-profile__information">
			<x-horse.big-card :horse="fake()->horse(4)" is-guest />
			<x-horse.advertisement is-guest />
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
				</div>
			</div>
			<div class="horse-profile-diary__block">
				<h3>Соревнования</h3>
				@for ($i = 0; $i < 2; $i++)
					<x-post.small-card :post="fake()->post()" category="Соревнования" />
				@endfor
			</div>
			<div class="horse-profile-diary__block">
				<h3>Здоровье</h3>
				@for ($i = 0; $i < 2; $i++)
					<x-post.small-card :post="fake()->post()" category="Здоровье" />
				@endfor
			</div>
			<div class="horse-profile-diary__buttons">
				<x-link href="/front/pages/diary/guest" button is-block size="big" color="pale" icon="chevron-right-solid">Показать все записи</x-link>
			</div>
		</div>

		@include('site.blocks.comments')
	</div>

	<x-modal name="change-of-owner-modal">
		<div class="complaint">
			<div class="complaint__header">Заявка на смену владельца лошади</div>
			<div class="complaint__content">
				<x-forms.file hint="В формате PDF, JPEG или PNG. До 10 файлов. Максимальный размер каждого файла — 8 MB." label="Документы, подтверждающие номер чипа и владение лошадью" required />
				<x-forms.input type="date" label="Дата покупки" required />
				<x-forms.textarea rows="5" label="Комментарий" />
			</div>
			<div class="complaint__button">
				<x-button is-block size="big" @click="openModal('change-of-owner-modal_complete')" icon="check-solid">Отправить заявку</x-button>
			</div>
		</div>
	</x-modal>

	<x-modal name="change-of-owner-modal_complete">
		<div class="complaint">
			<div class="complaint__content complaint__content_text">
				<div class="complaint__header">Заявка отправлена!</div>
				<p>Модераторы проверят соответствие документов в ближайшее рабочее время.</p>
				<p>После проверки мы привяжем лошадь к вашему аккаунту и добавим в раздел «Мои лошади».</p>
			</div>
			<div class="complaint__button">
				<x-link is-block size="big" href="/front/pages/horses/guest" button icon="chevron-left-solid">Вернуться на страницу</x-link>
			</div>
		</div>
	</x-modal>

	<x-modal name="contant-sale-modal">
		<div class="complaint">
			<div class="complaint__content complaint__content_text">
				<div class="complaint__header">Контакты продавца</div>

				<x-link button icon="mobile-alt-solid">+7 931 009-37-72</x-link>
				<x-link button icon="mobile-alt-solid">+7 931 009-37-72</x-link>
			</div>
		</div>
	</x-modal>
@stop
