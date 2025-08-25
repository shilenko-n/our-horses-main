<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reaction extends Model
{
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
