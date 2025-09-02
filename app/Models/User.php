<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Models\Traits\HasBlogs;
use App\Models\Traits\HasCards;
use App\Models\Traits\HasHorses;
use App\Models\Traits\HasSubscriptions;
use App\Models\Traits\User\HasAvatar;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Traits\HasLocation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $birthday
 * @property string $phone
 * @property string $gender
 * @property string $description
 * @property int $balance
 * @property UserRole $role
 */
class User extends Authenticatable implements MustVerifyEmail, HasMedia
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
        HasHorses,
        HasAvatar,
        InteractsWithMedia;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'balance',
        'age',
        'city_id',
        'nickname',
        'phone',
        'birthday',
        'description',
        'gender',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile();
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

//    public function subscribedHorse(): Collection
//    {
//        return Subscription
//            ::where(['user_id' => $this->id, 'subscriptionable_type' => 'App\Models\Horse'])
//            ->get();
//    }

    /**
     * Получение всех подписок пользователя на лошадей
     *
     * @return MorphToMany
     */
    public function horseSubscriptions(): MorphToMany
    {
        return $this->morphedByMany(
            Horse::class,
            'subscriptionable',
            'subscriptions',
            'user_id',
            'subscriptionable_id',
        );
    }

    /**
     * Получение всех подписок на других пользователей
     *
     * @return MorphToMany
     */
    public function userSubscriptions(): MorphToMany
    {
        return $this->morphedByMany(
            User::class,
            'subscriptionable',
            'subscriptions',
            'user_id',
            'subscriptionable_id',
        );
    }

    public function subscribedBreed(): Collection
    {
        return Subscription::where(['user_id' => $this->id, 'subscriptionable_type' => 'App\Models\Horse'])->get();
    }

    public function getFullName(): string
    {
        return $this->name . ' ' . $this->surname;
    }
}
