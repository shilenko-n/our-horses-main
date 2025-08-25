<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Модель закладки пользователя
 *
 * @property User $user
 * @property string $bookmarkableType
 * @property int $bookmarkableId
 */
class Bookmark extends Model
{
    protected $fillable = [
        'bookmarkable_id',
        'bookmarkable_type',
        'user_id',
    ];

    /**
     * Получение связи закладок с моделью
     *
     * @return MorphTo
     */
    public function bookmarkable(): MorphTo
    {
        return $this->morphTo();
    }
}
