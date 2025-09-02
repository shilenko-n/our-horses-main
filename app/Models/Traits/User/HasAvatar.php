<?php namespace App\Models\Traits\User;

use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
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

    /**
     * Получить ссылку на аватар
     *
     * @return string
     */
    public function getAvatarUrl(): ?string
    {
        return $this->getAvatar()?->getUrl();
    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function setAvatar($avatar): Media
    {
        return $this
            ->addMedia($avatar)
            ->setFileName(\Str::random(15) . '.' . $avatar->extension())
            ->toMediaCollection('avatar');
    }
}
