<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Модель валюты
 *
 * @property int $id
 * @property string $name
 */
class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
