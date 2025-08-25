<?php namespace App\Models\Traits;

use App\Models\Horse;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasHorses
{

    /**
     * Получение всех лошадей
     *
     * @return HasMany
     */
    public function horses(): HasMany
    {
        return $this->hasMany(Horse::class);
    }

}
