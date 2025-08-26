<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Modal extends Component
{
	public $showModal = false; // Управляет видимостью модального окна
	public $title = '';        // Заголовок модального окна
	public $content = '';      // Контент модального окна
	public $footer = '';      // Подвал модального окна
	public $class = '';        // Дополнительные CSS-классы модального окна

	protected $listeners = ['openModal'];

	// Метод для открытия модального окна
	public function openModal($data)
	{
		$this->title = $data['title'];
		$this->content = $data['content'];
		$this->footer = $data['footer'];
		$this->class = $data['class'] ?? '';
		$this->showModal = true;
	}

	// Метод для закрытия модального окна
	public function closeModal()
	{
		$this->showModal = false;
		$this->title = '';
		$this->content = '';
		$this->footer = '';
		$this->class = '';
	}
    public function render()
    {
        return view('livewire.components.modal');
    }
}
