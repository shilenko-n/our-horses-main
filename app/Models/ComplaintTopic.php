<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * Модель темы жалобы
 *
 * @property int $id
 * @property string $name
 * @property Collection|Complaint[] $complaints
 */
class ComplaintTopic extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * Получение всех жалоб с такой темой
     *
     * @return HasMany
     */
    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class);
    }
}
