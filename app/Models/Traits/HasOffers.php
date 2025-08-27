<?php namespace App\Models\Traits;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasOffers
{

    /**
     * Вернуть все предложения продажди/аренды
     *
     * @return HasMany
     */
    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

}
