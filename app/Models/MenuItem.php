<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Models\Traits\HasMenu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Модель элемента меню
 *
 * @property string $name
 * @property string $icon
 * @property string $route
 * @property Menu $menu
 * @property UserRole $role_access
 */
class MenuItem extends Model
{
    use
        HasMenu;

    protected $fillable = [
        'name',
        'icon',
        'route',
        'menu_id',
        'role_access',
    ];


}
