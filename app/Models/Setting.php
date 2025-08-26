<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель настроек сайта
 *
 * @property int $id
 * @property string $key
 * @property string $value
 */
class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];
}
