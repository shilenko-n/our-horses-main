<?php

namespace App\Models;

use App\Models\Traits\HasComments;
use App\Models\Traits\HasReactions;
use App\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель статьи
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property boolean $published
 * @property User $user
 * @property Collection|Reaction[] $reactions
 */
class Article extends Model
{
    use HasUser,
        HasReactions,
        HasComments;

    protected $fillable = [
        'title',
        'content',
        'published',
        'user_id',
    ];

}
