<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Модель города
 *
 * @property int $id
 * @property string $name
 * @property Country $country
 */
class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
    ];


    /**
     * Связь со страной
     *
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
