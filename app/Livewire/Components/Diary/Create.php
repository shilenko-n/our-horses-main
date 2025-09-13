<?php

namespace App\Livewire\Components\Diary;

use App\Models\Blog;
use App\Models\BlogBlock;
use App\Models\DiaryTopic;
use App\Models\Horse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{

    public Horse $horse;

    public string $title;
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

    public function transferBlocks($blocks): void
    {
        $this->blocks = $blocks;
    }

    public function submit()
    {

        $blog = Blog::query()->create([
            'user_id'       => auth()->id(),
            'title'         => $this->title,
            'published'     => $this->published,
            'commentable'   => $this->allowComments,
            'horse_id'      => $this->horse->id,
        ]);

        foreach ($this->blocks as $block) {
            BlogBlock::query()->create([
                'blog_id'       => $blog->id,
                'type'          => $block['type'],
                'content'       => $block['content'],
                'position'      => $block['position'],
            ]);
        }

    }

    public function render(): View
    {
        return view('livewire.components.diary.create');
    }
}
