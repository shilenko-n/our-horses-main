<x-diary-block title="Видео" :disable-up="$disableUp ?? false" :disable-down="$disableDown ?? false">
	{{-- blade-formatter-disable --}}
	<x-video
	:poster-phone="asset('img/layout/post/edit-1/p.jpeg')"
	:poster-tablet="asset('img/layout/post/edit-1/t.jpeg')"
	:poster-laptop="asset('img/layout/post/edit-1/l.jpeg')"
	:poster="asset('img/layout/post/edit-1/w.jpeg')"
	class="diary-block__image"
>
	<iframe
		width="560"
		height="315"
		src="https://www.youtube.com/embed/_cqrFTYJ3Hw?si=wCc9ysC2Q9pwBwXz"
		title="YouTube video player"
		frameborder="0"
		allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
		referrerpolicy="strict-origin-when-cross-origin"
		allowfullscreen
	></iframe>
</x-video>
{{-- blade-formatter-enable --}}
	<x-forms.input value="https://www.youtube.com/watch?v=yCsFyAl4dW" />
	<x-forms.input value="Конные скачки в Москве, май 2022 года" />
</x-diary-block>
