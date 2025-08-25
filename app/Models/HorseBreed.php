<?php

namespace App\Models;

use App\Models\Traits\HasHorses;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Порода лошади
 *
 * @property Collection|Horse[] $horses
 * @property string $name
 */
class HorseBreed extends Model
{
    use HasHorses;

    protected $fillable = [
        'name',
    ];
}
