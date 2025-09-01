<?php namespace App\Models\Traits\User;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasAvatar
{

    /**
     * Получить аватар пользователя
     *
     * @return Media|null
     */
    public function getAvatar(): Media|null
    {
        return $this->getFirstMedia('avatar');
    }
}
