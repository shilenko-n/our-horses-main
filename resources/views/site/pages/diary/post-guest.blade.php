@extends('site.layout.template-without-footer')

@section('page.content')
	@php($horse = fake()->horse(1))
	<div class="diary diary_single">
		<div class="diary__container diary__container_post">
			<div class="post">
				<div class="post__header">
					<div class="post__header-meta">
						<div class="post__header-info">
							{{-- blade-formatter-disable --}}
							<x-breadcrumbs :items="[
								[
									'url' => '/front/pages/horses/list',
									'title' => 'Мои лошади'
								],
								[
									'url' => '/front/pages/horses/view',
									'title' => $horse['name']
								],
								[
									'url' => '/front/pages/diary/view',
									'title' => 'Дневник'
								]
							]" />
							{{-- blade-formatter-enable --}}
							<h2 class="post__title">Как правильно запрячь лошадь</h2>
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

					</div>
					<x-user.mini-card class="post__user" href="/front/pages/profile/user/view" :nickname="$horse['name']" :username="fake()->human(1)['name']" :photo="$horse['photo']['p']" />
				</div>
				<x-share />

				<div class="post__content">
					<figure>
						{{-- blade-formatter-disable --}}
						<x-picture class="post__content-image"
							:phone="asset('img/layout/post/guest-1/p.jpeg')"
							:tablet="asset('img/layout/post/guest-1/t.jpeg')"
							:laptop="asset('img/layout/post/guest-1/l.jpeg')"
							:image="asset('img/layout/post/guest-1/w.jpeg')"
						/>
						{{-- blade-formatter-enable --}}
						<figcaption>Если седло размещено правильно, то прямо перед седлом будет тоненькая полоска, она будет выходить прямо из-под низа лука седла</figcaption>
					</figure>

					<div class="post__content_text">
						<p>Аккуратно разместите седло на спине у лошади. Оно должно находиться по середине потника. Еще раз проверьте, чтобы оно не мешало плечам лошади. Если седло размещено правильно, то прямо перед седлом на потнике будет тоненькая полоска, она будет выходить прямо из-под низа лука седла. Если вы используете мартингал, то прикрепите его до того, как положить седло. Также обратите ваше внимание на то, что конец потника нужно размещать на луке седла. Так легче всего поднять седло с потником так, чтобы аккуратно положить его в нескольких сантиметрах от гривы.</p>
					</div>

					<figure>
						{{-- blade-formatter-disable --}}
						<x-picture class="post__content-image"
							:phone="asset('img/layout/post/guest-2/p.jpeg')"
							:tablet="asset('img/layout/post/guest-2/t.jpeg')"
							:laptop="asset('img/layout/post/guest-2/l.jpeg')"
							:image="asset('img/layout/post/guest-2/w.jpeg')"
						/>
						{{-- blade-formatter-enable --}}
					</figure>

					<x-gallery name="post">
						@for ($i = 1; $i <= 4; $i++)
							<figure class="post__gallery-item">
								{{-- blade-formatter-disable --}}
								<x-picture class="post__content-image"
									:phone="asset('img/layout/post/guest-gallery/p/' . $i . '.jpeg')"
									:tablet="asset('img/layout/post/guest-gallery/t/' . $i . '.jpeg')"
									:laptop="asset('img/layout/post/guest-gallery/l/' . $i . '.jpeg')"
									:image="asset('img/layout/post/guest-gallery/w/' . $i . '.jpeg')"
								/>
								{{-- blade-formatter-enable --}}
							</figure>
						@endfor
					</x-gallery>

					<div class="post__content_text">
						<p>Наденьте обхватывающий пояс, чтобы закрепить седло. Некоторые лошади будут раздувать свои легкие. Если вы знаете, что ваша лошадь так делает, постепенно затягивайте ремень с двух сторон так, чтобы она могла спокойно выдыхать, продолжайте затягивать до момента закрепления. В идеале вы должны затянуть обхватывающий пояс на ¾, так туго, как вы привыкли. Если ваше седло не прикреплено, прикрепите его с помощью держателей. Если вы используете подперсье, или обхватывающий пояс вокруг груди, то это как раз время его зафиксировать. Дайте лошади сделать хотя бы три шага вперед и назад. Подтяните пояс и постепенно продолжайте подтягивать его, до полного затягивания.</p>
					</div>
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
					</div>

					<x-user.mini-card class="post__user" href="/front/pages/profile/user/view" :nickname="$horse['name']" :username="fake()->human(0)['name']" :photo="$horse['photo']['p']" />
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
