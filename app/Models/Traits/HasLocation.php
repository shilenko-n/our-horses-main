<?php namespace App\Models\Traits;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

trait HasLocation
{

    /**
     * Получить город
     *
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Получить страну
     *
     * @return HasOneThrough
     */
    public function country(): HasOneThrough
    {
        return $this->hasOneThrough(
            Country::class,
            City::class,
            'id',
            'id'
        );
    }

    public function location(): string
    {
        return $this->country->name . ' ' . $this->city->name;
    }

}
