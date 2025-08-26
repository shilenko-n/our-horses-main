<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Support extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $subject;
    public $message;
    public $file; // Свойство для хранения загружаемого файла
    public $showModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'required|string',
        'message' => 'required|string',
        'file' => 'nullable|file|mimes:jpg,png,pdf|max:8192', // Правила валидации для файла
    ];

    public function submit()
    {
//        $this->validate();
//
//        // Логика обработки формы (например, отправка email)
//        if ($this->file) {
//            // Обработка загруженного файла
//            $path = $this->file->store('uploads'); // Сохраняем файл в папке storage/app/uploads
//            \Log::info('File uploaded successfully: ' . $path);
//        }

		// Открываем модальное окно
		$this->dispatch('openModal', [
			'class' => 'modal_support',
			'title' => 'Запрос отправлен!',
			'content' => '<p>Мы рассмотрим ваше обращение в ближайшее рабочее время.</p>',
			'footer' => '<a class="btn btn_accent link_icon t-align-center" href="/front/pages/profile/guest/view"><i class="icon icon-chevron-left-solid" aria-hidden="true"></i><span>вернуться на страницу</span></a>'
		]);

		$this->reset(['name', 'email', 'subject', 'message', 'file']);
    }

    public function render()
    {
        return view('livewire.support');
    }
}
