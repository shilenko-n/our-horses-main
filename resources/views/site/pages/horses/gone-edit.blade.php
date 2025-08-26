@extends('site.layout.template-without-footer')

@section('page.title', 'Главная')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="horse-form horse-form_two">
		<div class="horse-form__breadcrumbs">
			<x-breadcrumbs :items="[['url' => '/front/pages/horses/list', 'title' => 'Мои лошади'], ['url' => '/front/pages/horses/view', 'title' => 'Изольда']]" />
			<h2 class="horse-big-card__title">Редактирование</h2>
		</div>
		<div class="horse-form__sections">
			<div class="horse-form__documents-section">
				<x-forms.input size="big" disabled type="number" value="34556000032456" label="Номер чипа" required placeholder="XXXXXXXXXXXXXXX" />
				<x-forms.input size="big" label="Дата покупки" value="2020-04-23" required type="date" />
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
					@include('site.blocks.horses.prev-horse-fields', ['checked' => true, 'disabled' => true])
				</div>
				<x-forms.input size="big" value="Изольда" label="Кличка" />
				<x-forms.input size="big" type="number" value="141" label="Рост в холке, см" />
				<div class="horse-form__input_3">
					<label>Пол</label>
					<div class="horse-form__input_3-checkboxes">
						<div class="horse-form__input_3-static">Мерин</div>
					</div>
				</div>
				<x-forms.select size="big" disabled label="Порода" required>
					<option value="">Не выбрана</option>
				</x-forms.select>
				<x-forms.select size="big" disabled label="Масть" required>
					<option value="">Не выбрана</option>
				</x-forms.select>
				<x-forms.select size="big" label="Специализация">
					<option value="">Не выбрана</option>
				</x-forms.select>
				<x-forms.input size="big" disabled type="date" label="Дата рождения" required />
				<x-forms.input size="big" disabled label="Отец" required icon="search-solid" icon-right />
				<x-forms.input size="big" disabled label="Мать" required icon="search-solid" icon-right />
				@include('site.blocks.horses.horse-placement-field', ['checked' => true])
				<x-forms.input size="big" label="Место рождения" />
				<x-forms.textarea class="horse-form__input_5" value="Лошади – это удивительно красивые животные. Их силе и грации могут позавидовать многие представители животного мира. Не удивительно, почему их так любят многие люди. Более того, именно эти животные вместе с человеком творили историю. Однако, что мы знаем интересного об этих животных?
Практически в каждой развитой стране есть отдельный отряд полиции на лошадях – конная полиция. Это очень удобно и маневренно в тех местах, куда машина или мотоцикл не может проехать. Например, такие патрули всегда охраняют порядок в парках и зонах отдыха, на городских улицах и загруженных транспортом проспектах. Первые полицейские лошади появились еще в XVII веке, а первая конная полиция организована в 1805 году. Сначала она существовала лишь в Англии, а затем опыт переняла Америка и Австралия, Россия." label="Расскажите о лошади" rows="5" required hint="Не менее 140 символов" />
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
					<x-button class="w-100-p" size="big" icon="check-solid">Сохранить изменения</x-button>
				</form>
			</div>
		</div>
	</div>
@stop
