<?php

namespace App\Livewire\Components\Diary;

use App\Models\Blog;
use App\Models\BlogBlock;
use App\Models\DiaryTopic;
use App\Models\Horse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\InvalidBase64Data;
use function Laravel\Prompts\clear;

class Create extends Component
{

    public Horse $horse;

    public string $title;
    public Collection $topics;
    public $selectedTopic;

    public array $blocks = [];

    public $allowComments   = false;
    public $published       = false;

    public function mount(Horse $horse): void
    {
        $this->horse = $horse;
        $this->topics = DiaryTopic::all();
    }

    public function transferBlocks($blocks): void
    {
        $this->blocks = [];

        foreach ($blocks as $index => $block) {
            $data = [
                'position'  => $block['position'],
                'type'      => $block['type'],
                'title'     => $block['title'],
            ];

            if($block['type'] == 'text' || $block['type'] == 'image') {
                $data['content'] = $block['content'];
            }

            $this->blocks[] = $data;
        }
    }

//    public function uploadImage($data): void
//    {
//        foreach ($this->blocks as $block) {
//            if($block['position'] === $data['position'] && $block['type'] === 'image') {
//                $block['content'] = $data['image'];
//            }
//        }
//
//        dd($this->blocks);
//    }

    /**
     * @throws FileCannotBeAdded
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws InvalidBase64Data
     */
    public function submit(): void
    {

        $blog = Blog::query()->create([
            'user_id'       => auth()->id(),
            'title'         => $this->title,
            'published'     => $this->published,
            'commentable'   => $this->allowComments,
            'horse_id'      => $this->horse->id,
        ]);

        foreach ($this->blocks as $block) {
            $blockModel = BlogBlock::query()->create([
                'blog_id'       => $blog->id,
                'type'          => $block['type'],
                'content'       => $block['type'] === 'text' ? $block['content'] : null,
                'position'      => $block['position'],
            ]);

            if($block['type'] == 'image') {
                $blockModel
                    ->addMediaFromBase64($block['content'])
                    ->toMediaCollection('images');
            }
        }

    }

    public function render(): View
    {
        return view('livewire.components.diary.create');
    }
}
