<?php

namespace App\Models;

use App\Models\Traits\HasHorses;
use App\Models\Traits\HasSubscriptions;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Порода лошади
 *
 * @property int $id
 * @property Collection|Horse[] $horses
 * @property string $name
 */
class HorseBreed extends Model
{
    use
        HasHorses,
        HasSubscriptions;

    protected $fillable = [
        'name',
    ];
}
