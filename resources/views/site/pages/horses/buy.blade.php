@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="horses-buy">
		<div class="horses-buy__content">
			<div class="horses-buy__heading">
				<h2 class="horses-but__title">Покупка лошади <span class="c-hint">467</span></h2>
				<div class="horses-buy__actions">
					<x-button-tabs size="adaptive" :tabs="[
					    [
					        'name' => 'В продаже',
					        'url' => '#',
					        'active' => true,
					    ],
					    [
					        'name' => 'В аренде',
					        'url' => '#',
					    ],
					]" />
					<x-forms.select size="adaptive" is-dropdown>
						<option>Сначала дорогие</option>
						<option>Первое значение</option>
						<option>Второе значение</option>
						<option>Третье значение</option>
					</x-forms.select>
					<div class="horses-buy__filter-button">
						<x-button size="adaptive" @click="openModal('horses-buy-modal-filter')" type="button" has-border icon="filter-solid" color="white">Открыть фильтр</x-button>
					</div>
				</div>
			</div>
			<div class="horses-buy__horses">
				@for ($i = 0; $i < 24; $i++)
					<x-horse.small-card href="/front/pages/horses/guest" :horse="fake()->horse($i + 1)" price="{{ fake()->numberBetween(500000, 5000000) }}" />
				@endfor
			</div>
			<div class="horses-buy__pagination">
				@include('site.blocks.paginator')
			</div>
			<div class="d-block-p">
				<x-right-sidebar-blocks.sidebar-banner is-mobile />
			</div>
		</div>
		<div class="horses-buy__sidebar">
			<div class="horses-buy__filter">
				<div class="horses-buy__filter-form">
					<div class="horses-buy__filter-form-fields">
						<h3>Фильтр</h3>
						<x-forms.input label="Страна" icon="search-solid" icon-right />
						<x-forms.input label="Город" icon="search-solid" icon-right />
						<x-forms.from-to-input name="price" type="number" label="Цена" />
						<x-forms.input label="Масть" icon="search-solid" icon-right />
						<x-forms.from-to-input name="price" type="number" label="Возраст, годы" />
						<x-forms.input label="Порода" icon="search-solid" icon-right />
						<x-forms.from-to-input name="price" type="number" label="Рост, см" />
						<div class="horses-buy__sex-field">
							<label>Пол</label>
							<x-forms.flag type="checkbox" label="Жеребец" name="sex" />
							<x-forms.flag type="checkbox" label="Кобыла" name="sex" />
							<x-forms.flag type="checkbox" label="Мерин" name="sex" />
						</div>
					</div>
					<div class="horses-buy__filter-form-buttons">
						<x-button is-block icon="check-solid">Показать</x-button>
						<x-button color="pale" icon="times-solid" />
					</div>
				</div>
				{{-- blade-formatter-disable --}}
					<x-filter-history :items="[
						['name' => 'От 100 000 ₽, арабская, конкур, от 3 лет', 'url' => '#'],
						['name' => 'От 500 000 ₽ до 1 000 000 ₽, Санкт-Петербург', 'url' => '#']
					]" />
				{{-- blade-formatter-enable --}}
			</div>
			<x-right-sidebar-blocks.sidebar-banner />
		</div>
	</div>

	<x-modal sidebar-content name="horses-buy-modal-filter">
		<div class="horses-buy__filter">
			<div class="horses-buy__filter-form">
				<div class="horses-buy__filter-form-fields">
					<h3>Фильтр</h3>
					<x-forms.input label="Страна" icon="search-solid" icon-right />
					<x-forms.input label="Город" icon="search-solid" icon-right />
					<x-forms.from-to-input name="price" type="number" label="Цена" />
					<x-forms.input label="Масть" icon="search-solid" icon-right />
					<x-forms.from-to-input name="price" type="number" label="Возраст, годы" />
					<x-forms.input label="Порода" icon="search-solid" icon-right />
					<x-forms.from-to-input name="price" type="number" label="Рост, см" />
					<div class="horses-buy__sex-field">
						<label>Пол</label>
						<x-forms.flag type="checkbox" label="Жеребец" name="sex" />
						<x-forms.flag type="checkbox" label="Кобыла" name="sex" />
						<x-forms.flag type="checkbox" label="Мерин" name="sex" />
					</div>
				</div>
				<div class="horses-buy__filter-form-buttons">
					<x-button is-block icon="check-solid">Показать</x-button>
					<x-button color="pale" icon="times-solid" />
				</div>
			</div>
			<x-filter-history :items="[['name' => 'От 100 000 ₽, арабская, конкур, от 3 лет', 'url' => '#'], ['name' => 'От 500 000 ₽ до 1 000 000 ₽, Санкт-Петербург', 'url' => '#']]" />
		</div>
	</x-modal>
@stop
