<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Services\Fakers\ChatMessages;
use Faker\Factory;

class ChatMessage extends Component
{
	public $message = [];
	public $isEditing = false; // Флаг для режима редактирования
	public $isDeleted = false; // Флаг для режима удаления

	public function mount()
	{
		// Генерация одного случайного сообщения
		$faker = new ChatMessages(Factory::create());
		$this->message = $faker->message();
	}

	// Включение режима редактирования
	public function edit()
	{
		$this->isEditing = true;
		$this->isDeleted = false;
	}

	// Сохранение изменений
	public function save()
	{
		$this->isEditing = false;
		// Здесь можно добавить сохранение в базу данных
	}

	// Удаление сообщения
	public function delete()
	{
		$this->isDeleted = true;
		$this->isEditing = false;
	}

	// Восстановление сообщения
	public function restore()
	{
		$this->isDeleted = false;
	}

    public function render()
    {
        return view('livewire.components.chat-message');
    }
}
