<x-diary-block title="Фотогалерея" :disable-up="$disableUp ?? false" :disable-down="$disableDown ?? false">
	<x-forms.file color="primary" multiple horizontal hint="В формате JPEG или PNG. До 20 файлов. Максимальный размер каждого файла — 8 MB. После загрузки изображение будет обрезано в пропорции 16:9." />
	<div class="diary-block__gallery">
		{{-- blade-formatter-disable --}}
			@php($descriptions = [
				'Лошадь Камила',
				'Конь Милано',
				'Скачки в Санкт-Петербурге',
				'',
				'Скачки в Санкт-Петербурге',
				'Конь Каннель со своим наездником',
			])
			{{-- blade-formatter-enable --}}
		@for ($i = 1; $i <= 6; $i++)
			<div class="diary-block__gallery-item">
				<div class="diary-block__gallery-actions">
					<x-button size="small" color="pale" icon="move-solid" />
					<x-button size="small" color="pale" icon="times-light" />
				</div>
				{{-- blade-formatter-disable --}}
					<x-picture
						:phone="asset('img/layout/post/gallery/p/' . $i . '.jpg')"
						:tablet="asset('img/layout/post/gallery/t/' . $i . '.jpg')"
						:laptop="asset('img/layout/post/gallery/l/' . $i . '.jpg')"
						:image="asset('img/layout/post/gallery/w/' . $i . '.jpg')"
						class="diary-block__image"
					/>
					{{-- blade-formatter-enable --}}
				<x-forms.input size="small" :value="$descriptions[$i - 1]" />
			</div>
		@endfor
	</div>
</x-diary-block>
