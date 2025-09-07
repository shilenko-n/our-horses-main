<?php namespace App\Models\Traits;

use App\Models\Horse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasHorses
{

    /**
     * Получение всех лошадей
     *
     * @return BelongsToMany
     */
    public function horses(): BelongsToMany
    {
        return $this->belongsToMany(Horse::class);
    }

}
