<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Models\Traits\HasBlogs;
use App\Models\Traits\HasCards;
use App\Models\Traits\HasHorses;
use App\Models\Traits\HasSubscriptions;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Traits\HasLocation;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $balance
 * @property UserRole $role
 */
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use
        Notifiable,
        HasFactory,
        Notifiable,
        HasLocation,
        HasBlogs,
        HasCards,
        HasSubscriptions,
        HasHorses;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'balance',
        'age',
        'city_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getAvatar(): string
    {
        return "https://cdn-icons-png.flaticon.com/512/6596/6596121.png";
    }
}
