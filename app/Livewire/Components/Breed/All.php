<?php

namespace App\Livewire\Components\Breed;

use App\Models\HorseBreed;
use Illuminate\View\View;
use Livewire\Component;

class All extends Component
{
    public int $perPage = 5;

    public $breeds;
    public $allCount;

    public function mount(): void
    {
        $this->breeds = HorseBreed::query()->take($this->perPage)->get();
        $this->allCount = HorseBreed::query()->count();
    }

    public function loadMore(): void
    {
        $this->perPage += 5;
        $this->breeds = HorseBreed::query()->take($this->perPage)->get();
    }

    public function render(): View
    {
        return view('livewire.components.breed.all');
    }
}
