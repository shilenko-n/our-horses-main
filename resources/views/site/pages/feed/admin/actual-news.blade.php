@extends('site.layout.template-without-footer')

@section('page.title', 'Свежие записи - страница администратора')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="feed__container">
		<div class="feed__heading">
			<h1 class="feed__container-title">Свежие записи</h1>
			<div class="feed__heading__controls">
				<x-feed-actions is-admin modalName="feed-sidebar-filter-modal" />
			</div>
		</div>

		<div class="feed__content">
			<div class="feed__newsline">
				{{--				Лошадь дня--}}
				<x-feed-blocks.horse-card :horse="fake()->horse(1)" :showHorseDay="true" />
				{{--				2 блока из блогов/дневников--}}
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(4)" :user="fake()->human()" :newsLine="true" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(5)" :user="fake()->human()" />
				<x-feed-blocks.banner></x-feed-blocks.banner>
				{{--				«Встречайте новеньких» - 4 последние добавленные на сайт лошади--}}
				<x-feed-blocks.feed-with-title title="Встречайте новеньких" :isGrid="true">
					@for ($i = 1; $i <= 4; $i++)
						@php($horse = fake()->horse($i))
						<x-horse.small-card href="/front/pages/horses/guest" :horse="$horse" is-subscribed />
					@endfor
				</x-feed-blocks.feed-with-title>
				{{--				3 блока из блогов/дневников--}}
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(1)" :user="fake()->human()"  />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(2)" :user="fake()->human()" :newsLine="true"  />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(3)" :user="fake()->human()"  />
				<x-feed-blocks.banner></x-feed-blocks.banner>
				{{--				«Лошади в продаже» - 4 случайно выбранные лошади, находящиеся в продаже--}}
				<x-feed-blocks.feed-with-title title="Лошади в продаже" :isGrid="true">
					@for ($i = 1; $i <= 4; $i++)
						@php($horse = fake()->horse($i + 4))
						<x-horse.small-card href="/front/pages/horses/guest" :horse="$horse" :price="fake()->numberBetween(1_000_000, 3_000_000)" is-subscribed />
					@endfor
				</x-feed-blocks.feed-with-title>
				{{--				«Самое интересное» - 2 записи из блогов/дневников, закрепленные модератором--}}
				<x-feed-blocks.feed-with-title title="Самое интересное">
					<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(4)" :user="fake()->human()" />
					<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(6)" :user="fake()->human()" />
				</x-feed-blocks.feed-with-title>
				{{--				5 блоков из блогов/дневников--}}
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(1)" :user="fake()->human()" :newsLine="true" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(2)" :user="fake()->human()" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(3)" :user="fake()->human()" />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(4)" :user="fake()->human()" :newsLine="true"  />
				<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(5)" :user="fake()->human()" />
				<x-feed-blocks.banner></x-feed-blocks.banner>
				{{--				«Самое интересное»--}}
				<x-feed-blocks.feed-with-title title="Самое интересное">
					<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(6)" :user="fake()->human()" />
					<x-feed-blocks.post-card href="/front/pages/blog/post-guest" :post="fake()->post(1)" :user="fake()->human()" />
				</x-feed-blocks.feed-with-title>
			</div>

			<div class="feed__filter">
				<x-right-sidebar-blocks.post-type />

				<x-right-sidebar-blocks.filter>
					<x-forms.input label="Содержание поста" type="text" name="phone" />
					<x-forms.from-to-input label="Дата публикации" type="date" name="published_at" />
					<x-forms.from-to-input label="Количество лайков" type="number" name="likes" />
					<x-forms.from-to-input label="Количество комментариев" type="number" name="comments" />
					<x-forms.from-to-input min="100" max="1000" label="Количество просмотров" type="number" name="views" />

					<x-slot:history>
						{{-- blade-formatter-disable --}}
							<x-filter-history :items="[
								['name' => 'Арабская, конкур', 'url' => '#'],
								['name' => 'Мустанг, скачки', 'url' => '#'],
								['name' => 'Тяжеловоз', 'url' => '#']
							]" />
						{{-- blade-formatter-enable --}}
					</x-slot>
				</x-right-sidebar-blocks.filter>

				<x-right-sidebar-blocks.sidebar-banner />
			</div>
		</div>
	</div>

	<v-modal ref="modalRef" name="feed-sidebar-filter-modal">
		<x-right-sidebar-blocks.filter class="feed-filter_modal">
			<x-forms.input label="Содержание поста" type="text" name="phone" />
			<x-forms.from-to-input label="Дата публикации" type="date" name="published_at" />
			<x-forms.from-to-input label="Количество лайков" type="number" name="likes" />
			<x-forms.from-to-input label="Количество комментариев" type="number" name="comments" />
			<x-forms.from-to-input min="100" max="1000" label="Количество просмотров" type="number" name="views" />

			<x-slot:history>
				{{-- blade-formatter-disable --}}
				<x-filter-history :items="[
								['name' => 'Арабская, конкур', 'url' => '#'],
								['name' => 'Мустанг, скачки', 'url' => '#'],
								['name' => 'Тяжеловоз', 'url' => '#']
							]" />
				{{-- blade-formatter-enable --}}
				</x-slot>
		</x-right-sidebar-blocks.filter>
	</v-modal>

@stop
