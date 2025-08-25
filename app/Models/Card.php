<?php

namespace App\Models;

use App\Enums\CardType;
use App\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;

/**
 * Банковская карта пользователя
 *
 * @property User $user
 * @property string $number
 * @property boolean $valid
 * @property CardType $type
 */
class Card extends Model
{
    use HasUser;

    protected $fillable = [
        'user_id',
        'number',
        'valid',
        'type',
    ];
}
