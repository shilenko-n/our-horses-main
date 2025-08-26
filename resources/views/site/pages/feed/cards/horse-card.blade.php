<div class="newsline__horse-card">
	<h2 class="newsline__horse-card-title">Лошадь дня</h2>
	<div class="newsline__slider">
		<x-slider>
			@foreach ([['https://placehold.co/1143x648?text=img-1-d', 'https://placehold.co/930x528?text=img-1-t', 'https://placehold.co/984x552?text=img-1-p'], ['https://placehold.co/1143x648?text=img-2-d', 'https://placehold.co/930x528?text=img-2-t', 'https://placehold.co/984x552?text=img-2-p'], ['https://placehold.co/1143x648?text=img-3-d', 'https://placehold.co/930x528?text=img-3-t', 'https://placehold.co/984x552?text=img-3-p'], ['https://placehold.co/1143x648?text=img-4-d', 'https://placehold.co/930x528?text=img-4-t', 'https://placehold.co/984x552?text=img-4-p']] as $image)
				<x-slider.slide>
					<picture>
						<source media="(max-width: 768px)" srcset="{{ $image[2] }}" />
						<source media="(max-width: 1366px)" srcset="{{ $image[1] }}" />
						<img src="{{ $image[0] }}">
					</picture>
				</x-slider.slide>
			@endforeach
		</x-slider>
	</div>
	<div class="newsline__horse-card-name">Изольда</div>
</div>
