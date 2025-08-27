<?php

namespace App\Models;

use App\Models\Traits\HasHorses;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Масть лошади
 *
 * @property int $id
 * @property Collection|Horse[] $horses
 * @property string $name
 */
class HorseColor extends Model
{
    use
        HasFactory,
        HasHorses;

    protected $fillable = [
        'name',
    ];
}
