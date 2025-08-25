<?php namespace App\Models\Traits;

use App\Models\Card;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasCard
{

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }

}
