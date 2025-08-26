<x-diary-block title="Фотография" :disable-up="$disableUp ?? false" :disable-down="$disableDown ?? false">
	<x-forms.file color="primary" horizontal hint="В формате JPEG или PNG. Максимальный размер файла — 8 MB. После загрузки изображение будет обрезано в пропорции 16:9." />
	{{-- blade-formatter-disable --}}
		<x-picture
			:phone="asset('img/layout/post/edit-1/p.jpeg')"
			:tablet="asset('img/layout/post/edit-1/t.jpeg')"
			:laptop="asset('img/layout/post/edit-1/l.jpeg')"
			:image="asset('img/layout/post/edit-1/w.jpeg')"
			class="diary-block__image"
		/>
	{{-- blade-formatter-enable --}}
	<x-forms.input value="Конные скачки в Москве, апрель 2020 года" />
</x-diary-block>
