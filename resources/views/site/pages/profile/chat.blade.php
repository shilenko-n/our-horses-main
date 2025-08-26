@extends('site.layout.template-without-footer')

@section('page.title', 'Переписка пользователей')
@section('page.description', '')
@section('page.keywords', '')

@section('page.content')
	<div class="chat">
		<div class="chat__container">
			<div class="chat__container__header">
				<h3 class="chat__container__header__h3">Василий Мерицкий</h3>
				<button class="chat__container__header__back-to-user-list js-open-sidebar"><x-icon icon="chevron-left-solid"></x-icon>Василий Мерицкий</button>
				<x-button wire:click="deleteThisChat" isNarrow="true" class="btn_transparent btn_shapeless btn_msg-control">Удалить переписку</x-button>
			</div>
			<div class="chat__container__body" id="chat-body">
				@for($i = 0; $i < 10; $i++)
					@livewire('components.chat-message', key($i))
				@endfor
			</div>
			<div class="chat__container__status">
				<div class="prints-status"><x-icon icon="pencil-alt-solid"></x-icon> Печатает...</div>
			</div>
			<div class="chat__container__footer">
				@livewire('components.chat-form')
			</div>
		</div>
		<div class="chat__sidebar">
			<x-forms.input id="id" type="text" name="search" icon="search-solid" icon-right placeholder="Поиск" />
			<div class="chat__sidebar__users">
				@for ($i = 0; $i < 24; $i++)
					@if($i == 0)
						<x-chat.user-card :user="fake()->chatUser($i)" href="/front/pages/profile/chat" :isActive="true"/>
					@else
						<x-chat.user-card :user="fake()->chatUser($i)" href="/front/pages/profile/chat" />
					@endif
				@endfor
			</div>
		</div>
	</div>

	<!-- Скрипт для добавления нового сообщения -->
	@push('scripts')
		<script>
			Livewire.on('newMessage', (message) => {

				// Создаем уникальный ключ для нового сообщения
				const uniqueKey = Date.now();

				// Проверяем, что элемент #chat-body существует
				const chatBody = document.getElementById('chat-body');

				// Добавляем новый компонент ChatMessage в DOM
				const newMessage = `
						<div wire:key="${uniqueKey}" class="chat-message chat-message_incoming">
							<p class="chat-message__content">${message[0].text}</p>
							<div class="chat-message__controls">
								<p class="chat-message__time">${message[0].date}</p>
								<button class="btn btn_accent btn_icon btn_narrow btn_transparent btn_shapeless"><i class="icon icon-ellipsis-h-regular" aria-hidden="true"></i></button>
							</div>
						</div>

					`;
				chatBody.insertAdjacentHTML('beforeend', newMessage);

				// Прокручиваем чат вниз
				chatBody.scrollTop = chatBody.scrollHeight;
			});
		</script>
	@endpush
@stop
