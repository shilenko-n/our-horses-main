<?php namespace App\Models\Traits;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasMenuItems
{

    /**
     * Получение всех элементов меню
     *
     * @return HasMany
     */
    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }

}
