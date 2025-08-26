{{-- DEPRECATED есть компонент --}}
<div class="newsline__post {{ $shadow ?? false ? 'newsline__post_shadow' : '' }}">
	<div class="newsline__post-user">
		@php($human = fake()->human())
		@php($horse = fake()->horse())
		<x-user.mini-card href="/front/pages/profile/user/view" username="{{ $human['name'] }}" :dark="false" photo="{{ $human['photo'] }}" nikname="{{ $horse['name'] }}" />
	</div>
	<div class="newsline__slider">
		<x-slider>
			@foreach (['https://placehold.co/1143x648?text=img-1', 'https://placehold.co/1143x648?text=img-2', 'https://placehold.co/1143x648?text=img-3', 'https://placehold.co/1143x648?text=img-4'] as $image)
				<x-slider.slide>
					<picture>
						<img src="{{ $image }}">
					</picture>
				</x-slider.slide>
			@endforeach
		</x-slider>
	</div>
	<div class="newsline__post-text">
		<h3 class="newsline__post-heading">Всеросийские гонки</h3>
		<div class="newsline__post-announcement">Лошади – это удивительно красивые животные. Их силе и грации могут позавидовать многие представители животного мира. Не удивительно, почему их так любят многие люди. Более того, именно эти животные вместе с человеком творили историю. Однако, что мы знаем интересного об этих животных? Практически в каждой развитой стране есть отдельный отряд полиции на лошадях – конная полиция. Это очень удобно и маневренно в тех местах, куда</div>
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
	<div class="newsline__post-comments">
		@for ($i = 0; $i < 3; $i++)
			<x-post-comment photo="{{ fake()->human()['photo'] }}">{{ fake()->sentences(2, true) }}</x-post-comment>
		@endfor
	</div>
</div>
