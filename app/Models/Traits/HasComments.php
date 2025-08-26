<?php namespace App\Models\Traits;

use App\DTO\Comment\CreateCommentDto;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComments
{

    /**
     * Получить все комментарии
     *
     * @return MorphMany<Comment>
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Комментировать модель
     *
     * @param CreateCommentDto $createCommentDto
     * @return Comment
     */
    public function comment(CreateCommentDto $createCommentDto): Comment
    {
        return $this->comments()->create([
            'user_id' => $createCommentDto->user->id,
            'reply_to' => $createCommentDto->replyTo?->id,
            'content' => $createCommentDto->content,
        ]);
    }

    /**
     * Удалить комментарий
     *
     * @param Comment $comment
     * @return int
     */
    public function removeComment(Comment $comment): int
    {
        return $this
            ->comments()
            ->where('id', $comment->id)
            ->delete();
    }


}
