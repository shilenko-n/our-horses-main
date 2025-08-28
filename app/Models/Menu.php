<?php

namespace App\Models;

use App\Models\Traits\HasMenuItems;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель меню
 *
 * @property string $name
 * @property Collection|MenuItem[] $menuItems
 */
class Menu extends Model
{
    use
        HasMenuItems;

    protected $fillable = [
        'name',
    ];

}
