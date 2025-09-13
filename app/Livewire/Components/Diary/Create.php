<?php

namespace App\Livewire\Components\Diary;

use App\Models\DiaryTopic;
use App\Models\Horse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{

    public Horse $horse;
    public Collection $topics;
    public $selectedTopic;

    public array $blocks;

    public $allowComments   = false;
    public $published       = false;

    public function mount(Horse $horse): void
    {
        $this->horse = $horse;
        $this->topics = DiaryTopic::all();
    }

    #[On('test')]
    public function submit($blocks): void
    {
        $this->blocks = $blocks;
    }

    #[On('sblocks')]
    public function sblocks()
    {
        dd($this->blocks);
    }

    public function render(): View
    {
        return view('livewire.components.diary.create');
    }
}
