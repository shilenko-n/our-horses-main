<?php

namespace App\Models;

use App\Enums\ReactionType;
use App\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;


/**
 * Модель реакции
 *
 * @property User $user
 * @property ReactionType $type
 * @property string $reactionableType
 * @property int $reactionableId
 */
class Reaction extends Model
{
    use HasUser;

    protected $fillable = [
        'reactionable_id',
        'reactionable_type',
        'user_id',
        'type',
    ];

    /**
     * Получение связи реакции с моделью
     *
     * @return MorphTo
     */
    public function reactionable(): MorphTo
    {
        return $this->morphTo();
    }
}
