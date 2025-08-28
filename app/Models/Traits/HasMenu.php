<?php namespace App\Models\Traits;


use App\Models\Menu;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasMenu
{
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
