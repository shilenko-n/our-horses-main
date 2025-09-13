<?php

namespace App\Livewire\Components\Feed;

use App\Models\Blog;
use Illuminate\View\View;
use Livewire\Component;

class PostCard extends Component
{
    public Blog $blog;
    public bool $newsLine;
    public string $alertMessage;
    public bool $showButtons;

    public function mount(
        Blog $blog,
        bool $newsLine = false,
        string $alertMessage = '',
        bool $showButtons = false,
    ): void
    {
        $this->blog = $blog;
        $this->newsLine = $newsLine;
    }

    public function render(): View
    {
        return view('livewire.components.feed.post-card');
    }
}
