<?php

namespace App\Models;

use App\Models\Traits\HasBookmarks;
use App\Models\Traits\HasHorse;
use App\Models\Traits\HasReactions;
use App\Models\Traits\HasSubscriptions;
use App\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Node\Stmt\Block;

/**
 * Модель блога
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property boolean $published
 * @property User $user
 * @property Horse|null $horse
 * @property Collection|Reaction[] $reactions
 */
class Blog extends Model
{
    use
        HasUser,
        HasHorse,
        HasReactions,
        HasBookmarks;

    protected $fillable = [
        'title',
        'user_id',
        'horse_id',
        'content',
        'published',
        'commentable',
    ];

    /**
     * Получение всех блоков записи
     *
     * @return HasMany
     */
    public function blocks(): HasMany
    {
        return $this
            ->hasMany(BlogBlock::class)
            ->orderBy('position');
    }
}
