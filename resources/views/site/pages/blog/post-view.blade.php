@extends('site.layout.template-without-footer')

@section('page.content')
	<div class="diary diary_single">
		<div class="diary__container diary__container_post">
			<div class="post">
				<div class="post__header">
					<div class="post__header-meta">
						<div class="post__header-info">
							{{-- blade-formatter-disable --}}
							<x-breadcrumbs :items="[
								[
									'url' => '/front/pages/profile/user/view',
									'title' => fake()->human(0)['name']
								],
							]" />
							{{-- blade-formatter-enable --}}
							<h2 class="post__title">Всероссийские гонки</h2>
							{{-- blade-formatter-disable --}}
							<x-post-controls
								:liked="fake()->boolean(20)"
								:likes="fake()->numberBetween(0, 100)"
								:comments="fake()->numberBetween(0, 100)"
								:views="fake()->numberBetween(0, 100)"
								:bookmarks="fake()->numberBetween(0, 30)"
								:timestamp="now()->setTimestamp(fake()->dateTimeThisYear()->getTimestamp())"
								show-views
							/>
							{{-- blade-formatter-enable --}}
						</div>
						<div class="post__header-actions">
							<x-link class="w-100-p" href="/front/pages/blog/edit-form" button icon="pencil-alt-solid">Редактировать</x-link>
							<x-button class="w-100-p" color="pale" icon="times-solid">Удалить</x-button>
						</div>
					</div>
					@php($user = fake()->human(0))
					<div class="comment__author">
						<img class="comment__avatar" src="{{ $user['photo'] }}" alt="">
						<div class="comment__author-info">
							<div class="comment__author-name">
								<div class="comment__username">{{ $user['name'] }}</div>
							</div>
							<div class="comment__location">{{ $user['location'] }}</div>
						</div>
					</div>
					<x-alert type="warning">Пост не опубликован и виден только вам</x-alert>
				</div>
				<x-share />

				<div class="post__content">
					<figure>
						{{-- blade-formatter-disable --}}
						<x-picture class="post__content-image"
							:phone="asset('img/layout/post/1/p.jpeg')"
							:tablet="asset('img/layout/post/1/t.jpeg')"
							:laptop="asset('img/layout/post/1/l.jpeg')"
							:image="asset('img/layout/post/1/w.jpeg')"
						/>
						{{-- blade-formatter-enable --}}
						<figcaption>Конные скачки в Москве, апрель 2020 года</figcaption>
					</figure>

					<div class="post__content_text">
						<p>Лошади – это удивительно красивые животные. Их силе и грации могут позавидовать многие представители животного мира. Не удивительно, почему их так любят многие люди. Более того, именно эти животные вместе с человеком творили историю. Однако, что мы знаем интересного об этих животных? Практически в каждой развитой стране есть отдельный отряд полиции на лошадях – конная полиция. Это очень удобно и маневренно в тех местах, куда машина или мотоцикл не может проехать. Например, такие патрули всегда охраняют порядок в парках и зонах отдыха, на городских улицах и загруженных транспортом проспектах. Первые полицейские лошади появились еще в XVII веке, а первая конная полиция организована в 1805 году. Сначала она существовала лишь в Англии, а затем опыт переняла Америка и Австралия, Россия.</p>
					</div>

					<figure>
						{{-- blade-formatter-disable --}}
						<x-picture class="post__content-image"
							:phone="asset('img/layout/post/2/p.jpeg')"
							:tablet="asset('img/layout/post/2/t.jpeg')"
							:laptop="asset('img/layout/post/2/l.jpeg')"
							:image="asset('img/layout/post/2/w.jpeg')"
						/>
						{{-- blade-formatter-enable --}}
						<figcaption>Конные скачки в Москве, май 2022 года</figcaption>
					</figure>

					<x-gallery name="post">
						{{-- blade-formatter-disable --}}
						@php($descriptions = [
							'Лошадь Камила',
							'Конь Милано',
							'Скачки в Санкт-Петербурге',
							'',
							'Скачки в Санкт-Петербурге',
							'Конь Каннель со своим наездником',
						])
						{{-- blade-formatter-enable --}}
						@for ($i = 1; $i <= 6; $i++)
							<figure class="post__gallery-item">
								{{-- blade-formatter-disable --}}
								<x-picture class="post__content-image"
									:phone="asset('img/layout/post/gallery/p/' . $i . '.jpg')"
									:tablet="asset('img/layout/post/gallery/t/' . $i . '.jpg')"
									:laptop="asset('img/layout/post/gallery/l/' . $i . '.jpg')"
									:image="asset('img/layout/post/gallery/w/' . $i . '.jpg')"
								/>
								{{-- blade-formatter-enable --}}
								<figcaption>{{ $descriptions[$i - 1] }}</figcaption>
							</figure>
						@endfor
					</x-gallery>

					<div class="post__content_text">
						<p>Слышали ли вы когда-то, что лошади в годы войны сами приходили домой или отыскивали хозяина в совсем отдаленных местах? Да, таких случаев много, и все это говорит о прекрасной памяти и обонянию коней. Животные плохо видят ночью, но с помощью обоняния они могут запросто найти дорогу домой. Или в труднопроходимых местах они с легкостью могут вывезти всадника. Лошади крайне чувствительные, поэтому всегда ощущают настроение и чувства человека.</p>
						<p>Более того, как говорят многие интересные факты про лошадей, у них отменная память. Если вы когда-то хоть раз обидели коня или посмеялись над ним, будьте готовы к мести. Лошади очень хорошо запоминают своих обидчиков, поэтому в следующий раз обязательно припомнят об этом. Не думайте, что животное забудет что-то через год. Они могут помнить обиду или наоборот дружбу всю жизнь. А еще они запоминают действия, например, как открыть защелку или отвязать привязь.</p>
					</div>

					<figure>
						{{-- blade-formatter-disable --}}
						<x-video
							:poster-phone="asset('img/layout/post/video/p.jpg')"
							:poster-tablet="asset('img/layout/post/video/t.jpg')"
							:poster-laptop="asset('img/layout/post/video/l.jpg')"
							:poster="asset('img/layout/post/video/w.jpg')"
						>
							<iframe width="100%" height="100%" src="https://www.youtube.com/embed/DppVAQqaNE4?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</x-video>
						{{-- blade-formatter-enable --}}
						<figcaption>Конные скачки в Москве, май 2022 года</figcaption>
					</figure>
				</div>

				<div class="post__footer">
					<div class="post__footer-meta">
						{{-- blade-formatter-disable --}}
						<x-post-controls
							class="post__footer-info"
							:liked="fake()->boolean(20)"
							:likes="fake()->numberBetween(0, 100)"
							:comments="fake()->numberBetween(0, 100)"
							:views="fake()->numberBetween(0, 100)"
							:bookmarks="fake()->numberBetween(0, 30)"
							:timestamp="now()->setTimestamp(fake()->dateTimeThisYear()->getTimestamp())"
							show-views
						/>
						{{-- blade-formatter-enable --}}

						<x-link class="w-100-p" href="/front/pages/blog/edit-form" button icon="pencil-alt-solid">Редактировать</x-link>
						<x-button class="w-100-p" color="pale" icon="times-solid">Удалить</x-button>
					</div>

					<div class="comment__author">
						<img class="comment__avatar" src="{{ $user['photo'] }}" alt="">
						<div class="comment__author-info">
							<div class="comment__author-name">
								<div class="comment__username">{{ $user['name'] }}</div>
							</div>
							<div class="comment__location">{{ $user['location'] }}</div>
						</div>
					</div>
				</div>

				<x-share />
			</div>

			<div class="diary__buy-horses">
				<h2>Лошади в продаже</h2>
				<div class="diary__buy-horses-items">
					<x-horse.small-card href="/front/pages/horses/view" :horse="fake()->horse()" price="{{ fake()->boolean() ? fake()->numberBetween(500000, 5000000) : 0 }}" />
					<x-horse.small-card href="/front/pages/horses/view" :horse="fake()->horse()" price="{{ fake()->boolean() ? fake()->numberBetween(500000, 5000000) : 0 }}" />
					<x-horse.small-card href="/front/pages/horses/view" :horse="fake()->horse()" price="{{ fake()->boolean() ? fake()->numberBetween(500000, 5000000) : 0 }}" />
				</div>
			</div>

			@include('site.blocks.comments')
		</div>
	</div>
@endsection
