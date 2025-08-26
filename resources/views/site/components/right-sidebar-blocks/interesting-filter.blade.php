<div {{ $attributes->class(['feed-filter', 'feed-filter_modal' => $isModal]) }}>
	<div class="feed-filter__heading">Фильтр</div>
	<div class="feed-filter__fields">
		<x-forms.select label="Тема">
			<option value="">Любая</option>
		</x-forms.select>
		<x-forms.input label="Автор" type="text" name="author" />
		<x-forms.input label="Страна" type="text" name="author" icon="search-solid" icon-right />
		<x-forms.input label="Город" type="text" name="author" icon="search-solid" icon-right />
		<x-forms.input label="Содержание поста" type="text" name="content" />
		<x-forms.from-to-input label="Дата публикации" type="date" name="published_at" />
		<x-forms.from-to-input label="Количество лайков" type="number" name="likes" />
		<x-forms.from-to-input label="Количество комментариев" type="number" name="comments" />
		<x-forms.from-to-input min="100" max="1000" label="Количество просмотров" type="number" name="views" />
	</div>
	<div class="feed-filter__buttons">
		<x-button class="feed-filter__button" icon="check-solid">Показать</x-button>
		<x-button class="feed-filter__button" color="pale" icon="times-solid" />
	</div>

	<div class="feed-filter__history">
		<div class="feed-filter__history-title">Последние фильтры</div>

		<div class="feed-filter__history-item">
			<div class="feed-filter__history-item-name">Санкт-Петербург, от 25.04.2022 до 15.06.2022</div>
			<a class="feed-filter__history-item-reset" href="#">
				<x-icon icon="times-solid" />
			</a>
		</div>
		<div class="feed-filter__history-item">
			<div class="feed-filter__history-item-name">Иван Иванов, скачки</div>
			<a class="feed-filter__history-item-reset" href="#">
				<x-icon icon="times-solid" />
			</a>
		</div>
	</div>
</div>
