<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Модель темы запроса технической поддержки
 *
 * @property string $title
 * @property Collection|TechnicalSupportRequest[] $technicalSupportRequests
 */
class TechnicalSupportRequestTopic extends Model
{
    protected $fillable = [
        'title',
    ];

    /**
     * Получение всех запросов технической поддержки с этой темой
     *
     * @return HasMany
     */
    public function technicalSupportRequests(): HasMany
    {
        return $this->hasMany(TechnicalSupportRequest::class);
    }
}
