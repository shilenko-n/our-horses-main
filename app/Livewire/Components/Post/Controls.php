<?php

namespace App\Livewire\Components\Post;

use App\Models\Blog;
use Illuminate\View\View;
use Livewire\Component;

class Controls extends Component
{

    public Blog $blog;
    public string $class;

    public bool $liked      = false;
    public bool $showViews  = true;

    public $views       = 0;
    public $likes       = 0;
    public $comments    = 0;
    public $bookmarks   = 0;

    public function mount(
        Blog $blog,
        string $class = ''
    ): void
    {
        $this->blog = $blog;
        $this->class = $class;

        $this->likes        = $blog->reactions()->count();
        $this->comments     = $blog->comments()->count();
        $this->bookmarks    = $blog->bookmarks()->count();
        $this->views        = $blog->views;

    }

    public function render(): View
    {
        return view('livewire.components.post.controls');
    }
}
