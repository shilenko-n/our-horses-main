<form wire:submit.prevent="submit" class="chat__container__footer__form">
	<x-forms.textarea wire:model="message" rows="3" placeholder="Текст сообщения"></x-forms.textarea>
	<div class="chat__container__footer__form__controls">
		<x-button wire:click="delete" isNarrow="true" class="btn_transparent btn_shapeless btn_msg-control d-none-m">Удалить переписку</x-button>
		<div class="chat__container__footer__form__controls__group">
			<x-forms.file mini="true" wire:model="file" />
			<x-button icon="check-solid" type="submit">Отправить</x-button>
		</div>
	</div>
</form>
