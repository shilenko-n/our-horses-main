<?php namespace App\Models\Traits;

use App\Models\Horse;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasHorse
{

    public function horse(): BelongsTo
    {
        return $this->belongsTo(Horse::class);
    }

}
