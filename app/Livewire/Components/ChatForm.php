<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class ChatForm extends Component
{
	use WithFileUploads;

	public $message;
	public $file;

	protected $rules = [
		'message' => 'required|string',
		'file' => 'nullable|file|mimes:jpg,png,pdf|max:8192',
	];

	public function submit()
	{
		// Валидация данных
		$this->validate();

		// Устанавливаем локаль для Carbon
		Carbon::setLocale('ru');

		// Генерация нового сообщения
		$newMessage = [
			'text' => $this->message,
			'date' => now()->isoFormat('D MMMM \в H:mm'), // Формат даты: "14 ноября в 14:28"
			'isMyMessage' => true, // Предполагаем, что это наше сообщение
			'isChange' => false, // Пример статуса
		];

		// Эмитируем событие для добавления нового сообщения в JavaScript
     	$this->dispatch('newMessage', $newMessage);
//		$this->dispatch('testEvent');

		$this->reset(['message', 'file']);
	}

	public function delete()
	{
		$this->dispatch('openModal', [
			'class' => 'modal_delete-chat',
			'title' => 'Вы действительно хотите удалить чат?',
			'content' => '<p>Переписку не возможно будет восстановить.</p>',
			'footer' => '<button class="btn ">Да</button><button class="btn btn_accent">Нет</button>'
		]);
	}

    public function render()
    {
        return view('livewire.components.chat-form');
    }
}
