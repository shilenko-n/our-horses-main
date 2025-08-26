<?php namespace App\Models\Traits;

use App\DTO\Comment\CreateCommentDto;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComments
{

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function comment(CreateCommentDto $createCommentDto): Comment
    {
        return $this->comments()->create([
            'user_id' => $createCommentDto->user->id,
            'reply_to' => $createCommentDto->replyTo?->id,
            'content' => $createCommentDto->content,
        ]);
    }


}
