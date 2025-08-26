<?php

namespace App\Models;

use App\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель уведомления
 *
 * @property int $id
 * @property User $user
 * @property string $content
 */
class Notice extends Model
{
    use HasUser;

    protected $fillable = [
        'user_id',
        'content',
    ];
}
