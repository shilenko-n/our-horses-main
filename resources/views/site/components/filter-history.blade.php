<div {{ $attributes->class(['filter-history']) }}>
	<div class="filter-history__title">Последние фильтры</div>

	@foreach ($items as $item)
		<div class="filter-history__item">
			<div class="filter-history__name">{{ $item['name'] }}</div>
			<a class="filter-history__reset" href="#">
				<x-icon icon="times-solid" />
			</a>
		</div>
	@endforeach
</div>
