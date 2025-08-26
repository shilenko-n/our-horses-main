<div {{ $attributes->class(['feed-filter', 'feed-filter_modal' => $isModal]) }}>
	<div class="feed-filter__heading">Фильтр</div>
	<div class="feed-filter__fields">
		<x-forms.select>
			<option value="">Все породы</option>
		</x-forms.select>
	</div>
	<div class="feed-filter__fields">
		<x-forms.select>
			<option value="">Все специализации</option>
		</x-forms.select>
	</div>
	<div class="feed-filter__fields">
		<x-forms.select>
			<option value="">Все темы</option>
		</x-forms.select>
	</div>
	<div class="feed-filter__buttons">
		<x-button class="feed-filter__button" icon="check-solid">Показать</x-button>
		<x-button class="feed-filter__button" color="pale" icon="times-solid" />
	</div>

	<div class="feed-filter__history">
		<div class="feed-filter__history-title">Последние фильтры</div>

		<div class="feed-filter__history-item">
			<div class="feed-filter__history-item-name">Арабская, конкур</div>
			<a class="feed-filter__history-item-reset" href="#">
				<x-icon icon="times-solid" />
			</a>
		</div>
		<div class="feed-filter__history-item">
			<div class="feed-filter__history-item-name">Мустанг, скачки</div>
			<a class="feed-filter__history-item-reset" href="#">
				<x-icon icon="times-solid" />
			</a>
		</div>
		<div class="feed-filter__history-item">
			<div class="feed-filter__history-item-name">Тяжеловоз</div>
			<a class="feed-filter__history-item-reset" href="#">
				<x-icon icon="times-solid" />
			</a>
		</div>
	</div>
</div>
