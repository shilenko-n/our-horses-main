<?php

namespace App\Models;

use App\Models\Traits\HasHorse;
use App\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель владельца
 *
 * @property User $user
 * @property Horse $horse
 * @property string $purchase
 * @property string|null $sale
 */
class Owner extends Model
{
    use
        HasUser,
        HasHorse;

    protected $fillable = [
        'user_id',
        'horse_id',
        'purchase',
        'sale',
    ];
}
