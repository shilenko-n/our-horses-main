<?php namespace App\Models\Traits;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasSubscriptions
{

    /**
     * Получение всех подписок
     *
     * @return MorphMany
     */
    public function subscriptions(): MorphMany
    {
        return $this->morphMany(Subscription::class, 'subscriptionable');
    }


    /**
     * Подписаться пользователем
     *
     * @param User $user
     * @return Model|Subscription
     */
    public function subscribe(User $user): Model|Subscription
    {
        return $this->subscriptions()->updateOrCreate(
            ['user_id' => $user->id],
        );
    }

    /**
     * Проверить подписан пользователь на модель
     *
     * @param User $user
     * @return bool
     */
    public function isSubscribed(User $user): bool
    {
        return $this
            ->subscriptions()
            ->get()
            ->contains('user_id', $user->id);
    }


    /**
     * Отписаться пользователем
     *
     * @param User $user
     * @return int
     */
    public function unsubscribe(User $user): int
    {
        return $this
            ->subscriptions()
            ->where('user_id', $user->id)
            ->delete();
    }

}
