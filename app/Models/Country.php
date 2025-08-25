<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * Модель страны
 *
 * @property string $name
 * @property Collection|City[] $cities
 */
class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    /**
     * Все города страны
     *
     * @return HasMany
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
