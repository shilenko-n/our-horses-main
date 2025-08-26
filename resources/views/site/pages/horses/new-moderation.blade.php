@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="horse-form horse-form_two">
		<div class="horse-form__breadcrumbs">
			<x-breadcrumbs :items="[['url' => '/front/pages/horses/list', 'title' => 'Мои лошади']]" />
			<h2 class="horse-big-card__title">Новая лошадь</h2>
		</div>
		<div class="horse-form__sections">
			<div class="horse-form__documents-section">
				<div class="horse-form__documents-section-alerts">
					<x-alert type="warning">Пол и порода лошади не соответствуют указанному в договоре. Пожалуйста, проверьте сведения</x-alert>
				</div>
				<x-forms.input size="big" disabled type="number" value="34556000032456" label="Номер чипа" required placeholder="XXXXXXXXXXXXXXX" />
				<x-forms.input size="big" label="Дата покупки" value="2020-04-23" required type="date" />
				<div class="horse-form__input_1">
					<x-forms.file label="Документы, подтверждающие номер чипа и владение лошадью" required hint="В формате PDF, JPEG или PNG. До 10 файлов. Максимальный размер каждого файла — 8 MB." />
				</div>
				<div class="horse-form__input_1-files">
					<x-file-link name="Ветеринарный паспорт лошади" size="236544" type="pdf" />
					<x-file-link name="Экспортный сертификат на лошадь от 20.06 2023" size="362496" type="jpeg" />
					<x-file-link name="Паспорт спортивной лошади" size="204800" type="png" />
					<x-file-link name="Договор купли-продажи от 12.05.2023" size="200704" type="pdf" />
					<x-file-link name="Ветеринарное свидетельство" size="200704" type="jpeg" />
					<x-file-link name="Племенное свидетельство лошади" size="418816" type="pdf" />
				</div>
			</div>
			<div class="horse-form__horse-information">
				<div class="horse-form__input_2">
					@include('site.blocks.horses.prev-horse-fields')
				</div>
				<x-forms.input size="big" required label="Кличка" />
				<x-forms.input size="big" type="number" label="Рост в холке, см" />
				<div class="horse-form__input_3">
					<label>Пол</label>
					<div class="horse-form__input_3-checkboxes">
						<x-forms.flag type="radio" label="Жеребец" name="sex" checked />
						<x-forms.flag type="radio" label="Кобыла" name="sex" />
						<x-forms.flag type="radio" label="Мерин" name="sex" />
					</div>
				</div>
				<x-forms.select size="big" label="Порода" required>
					<option value="">Не выбрана</option>
				</x-forms.select>
				<x-forms.select size="big" label="Масть" required>
					<option value="">Не выбрана</option>
				</x-forms.select>
				<x-forms.select size="big" label="Специализация">
					<option value="">Не выбрана</option>
				</x-forms.select>
				<x-forms.input size="big" type="date" label="Дата рождения" required />
				<x-forms.input size="big" label="Отец" required icon="search-solid" icon-right />
				<x-forms.input size="big" label="Мать" required icon="search-solid" icon-right />
				@include('site.blocks.horses.horse-placement-field')
				<x-forms.input size="big" label="Место рождения" />
				<x-forms.textarea class="horse-form__input_5" label="Расскажите о лошади" rows="5" required hint="Не менее 140 символов" />
			</div>
			<div class="horse-form__photos-section">
				<x-forms.file label="Фотографии" required hint="В формате JPEG или PNG. До 20 файлов. Максимальный размер каждого файла — 8 MB. После загрузки изображение будет обрезано в пропорции 16:9." />
				<div class="image-previews">
					<x-image-preview url="/img/assets/horses/d/01.jpeg" />
					<x-image-preview url="/img/assets/horses/d/02.jpeg" />
					<x-image-preview url="/img/assets/horses/d/03.jpeg" />
					<x-image-preview url="/img/assets/horses/d/04.jpeg" />
					<x-image-preview url="/img/assets/horses/d/05.jpeg" />
					<x-image-preview url="/img/assets/horses/d/06.jpeg" />
					<x-image-preview url="/img/assets/horses/d/07.jpeg" />
					<x-image-preview url="/img/assets/horses/d/08.jpeg" />
					<x-image-preview url="/img/assets/horses/d/09.jpeg" />
				</div>
			</div>
			<div class="horse-form__buttons-section">
				<form class="horse-form__step-two-buttons" action="/front/pages/horses/list">
					<x-button class="w-100-p" size="big" icon="check-solid">Отправить на модерацию</x-button>
					<x-button class="w-100-p" color="pale" size="big">Сохранить черновик</x-button>
					<x-button class="w-100-p" link>Удалить лошадь</x-button>
				</form>
			</div>
		</div>
	</div>
@stop
