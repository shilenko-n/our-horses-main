<?php

namespace App\Models;

use App\Models\Traits\HasBookmarks;
use App\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Модель комментария
 *
 * @property int $id
 * @property User $user
 * @property string $content
 * @property User|null $replyTo
 */
class Comment extends Model
{
    use
        HasUser,
        HasBookmarks;

    protected $fillable = [
        'user_id',
        'content',
        'commentable_id',
        'commentable_type',
        'reply_to',
    ];

    /**
     * Получение связи комментария с моделью
     *
     * @return MorphTo
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

}
