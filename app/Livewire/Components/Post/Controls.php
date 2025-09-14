<?php

namespace App\Livewire\Components\Post;

use App\Models\Blog;
use Illuminate\View\View;
use Livewire\Attributes\On;
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

        $this->liked        = $blog->getReaction(auth()->user()) !== null;
    }

    public function react(): void
    {

        $this->liked = !$this->liked;

        if($this->liked) {
            $this->blog->react(auth()->user());
        } else {
            $this->blog->removeReaction(auth()->user());
        }

        $this->mount($this->blog, $this->class);
        $this->dispatch('update-post-controls');
    }

    #[On('update-post-controls')]
    public function updatePostControls(): void
    {
        $this->mount($this->blog, $this->class);
    }

    public function render(): View
    {
        return view('livewire.components.post.controls');
    }
}
