<?php

namespace App\Livewire\Components\Diary;

use App\Models\DiaryTopic;
use App\Models\Horse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{

    public Horse $horse;
    public Collection $topics;
    public $selectedTopic;

    public function mount(Horse $horse): void
    {
        $this->horse = $horse;
        $this->topics = DiaryTopic::all();
    }

    public function render(): View
    {
        return view('livewire.components.diary.create');
    }
}
