<?php

namespace App\Models;

use App\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Модель подписки
 *
 * @property string $subscriptionableType
 * @property int $subscriptionableId
 * @property User $user
 */
class Subscription extends Model
{
    use HasUser;

    protected $fillable = [
        'user_id',
        'subscriptionable_id',
        'subscriptionable_type',
    ];

    /**
     * Получение связи подписки с моделью
     *
     * @return MorphTo
     */
    public function subscriptionable(): MorphTo
    {
        return $this->morphTo();
    }

}
