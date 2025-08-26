<div class="horse-card">
	@if ($showHorseDay)
		<h2 class="horse-card__title">Лошадь дня</h2>
	@endif
	<div class="horse-card__slider">
		<x-slider>
			@foreach ($horse['slider'] as $slide)
				<x-slider.slide>
					<picture>
						<source media="(max-width: 768px)" srcset="{{ $slide['p'] }}" />
						<source media="(min-width: 769px) and (max-width: 1280px)" srcset="{{ $slide['t'] }}" />
						<img src="{{ $slide['d'] }}">
					</picture>
				</x-slider.slide>
			@endforeach
		</x-slider>
	</div>

	<div class="horse-card__info">
		<h3 class="horse-card__name">{{ $horse['name'] }}</h3>
		@if (!$showHorseDay)
		<div class="horse-card__badges">
			<div class="horse__badge horse__badge_big horse__badge_static">
				<div>Записи</div>
				<div>{{ $horse['records'] }}</div>
			</div>
			<div class="horse__badge horse__badge_big horse__badge_static">
				<div>Упоминания</div>
				<div>{{ $horse['mentions'] }}</div>
			</div>
		</div>
		@endif
	</div>
	@if (!$showHorseDay)
	<p class="horse-card__breed">{{ $horse['breed'] }}, {{ $horse['location'] }}</p>
	@endif
	@if ($showAddButton)
		<div class="horse-card__button">
			<x-link href="/front/pages/diary/create-form" button icon="plus-solid">Написать в дневник</x-link>
		</div>
	@endif
</div>
