<?php

namespace App\Models;

use App\Models\Traits\HasBookmarks;
use App\Models\Traits\HasComments;
use App\Models\Traits\HasHorse;
use App\Models\Traits\HasReactions;
use App\Models\Traits\HasSubscriptions;
use App\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Node\Stmt\Block;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
 * @property Collection|BlogBlock[] $blocks
 */
class Blog extends Model
{
    use
        HasUser,
        HasHorse,
        HasReactions,
        HasBookmarks,
        HasComments;

    protected $fillable = [
        'title',
        'user_id',
        'horse_id',
        'content',
        'published',
        'commentable',
        'topic_id',
    ];

    public function hasPreview(): bool
    {
        foreach ($this->blocks as $block) {
            if($block->hasPreview())
                return true;
        }

        return false;
    }

    public function getPreview(): Media|null
    {
        foreach ($this->blocks as $block) {
            if($block->hasPreview())
                return $block->getPreview();
        }

        return null;
    }

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
