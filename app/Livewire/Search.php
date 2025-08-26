<?php

namespace App\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $search;
    public $subject;
    public $showSearch = false;

    protected $rules = [
        'search' => 'required|string',
        'subject' => 'required|string',
    ];

    public function submitSearch()
    {
        // $this->validate();
        // \Log::info('Form submitted successfully');

        // Показываем результаты поиска
        $this->showSearch = true;
    }

    public function render()
    {
        return view('livewire.search');
    }
}
