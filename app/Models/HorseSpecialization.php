<?php

namespace App\Models;

use App\Models\Traits\HasHorses;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Специализация лошади
 *
 * @property Collection|Horse[] $horses
 * @property string $name
 */
class HorseSpecialization extends Model
{
    use HasHorses;

    protected $fillable = [
        'name',
    ];
}
