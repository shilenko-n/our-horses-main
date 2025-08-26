<div class="chat-message {{ $message['isMyMessage'] ? 'chat-message_incoming' : 'chat-message_outgoing' }}">
	@if ($isDeleted)
		<!-- Режим удаления -->
		<div class="chat-message__deleted">
			<p>Сообщение удалено.</p>
			<x-button isNarrow="true" wire:click="restore" class="btn_transparent btn_shapeless btn_msg-control">Восстановить</x-button>
		</div>
	@elseif ($isEditing)
		<!-- Режим редактирования -->
		<x-forms.textarea wire:model="message.text" rows="3" class="input_chat-message"></x-forms.textarea>
		<div class="chat-message__controls chat-message__controls_edite">
			<p class="chat-message__time">{{ $message['date'] }}</p>
			<x-button isNarrow="true" wire:click="save" class="btn_transparent btn_shapeless btn_msg-control">Сохранить</x-button>
			<x-button isNarrow="true" wire:click="delete" class="btn_transparent btn_shapeless btn_msg-control">Удалить</x-button>
		</div>
	@else
		<!-- Режим просмотра -->
		<p class="chat-message__content">{{ $message['text'] }}</p>
		<div class="chat-message__controls">
			@if ($message['isMyMessage'])
				<p class="chat-message__time">{{ $message['date'] }}</p>
				<x-button isNarrow="true" icon="ellipsis-h-regular" class="btn_transparent btn_shapeless" wire:click="edit"></x-button>
			@else
				<p class="chat-message__time">{{ $message['date'] }}</p>
			@endif
		</div>
	@endif
</div>
