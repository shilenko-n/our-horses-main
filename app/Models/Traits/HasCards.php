<?php namespace App\Models\Traits;

use App\Models\Card;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasCards
{
    /**
     * Получение всех банковских карт
     *
     * @return BelongsToMany
     */
    public function cards(): BelongsToMany
    {
        return $this->belongsToMany(Card::class);
    }
}
