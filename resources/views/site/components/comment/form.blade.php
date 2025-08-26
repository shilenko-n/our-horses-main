<div class="comment-form__form">
	<img class="comment-form__avatar" src="{{ fake()->avatar(0) }}" alt="">
	<div class="comment-form__inputs">
		<x-forms.textarea rows="5" placeholder="Текст комментария" />
		<div class="comment-form__buttons">
			<x-button color="pale" icon="file-image-solid" />
			<x-button icon="check-solid">Отправить</x-button>
		</div>
	</div>
</div>
