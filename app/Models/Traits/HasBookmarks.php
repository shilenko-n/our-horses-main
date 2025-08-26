<?php namespace App\Models\Traits;

use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasBookmarks
{

    /**
     * Получение всех закладок
     *
     * @return MorphMany
     */
    public function bookmarks(): MorphMany
    {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }

    /**
     * Добавление закладки
     *
     * @param User $user
     * @return Bookmark
     */
    public function addBookmark(User $user): Bookmark
    {
        return $this->bookmarks()->updateOrCreate(
            ['user_id' => $user->id],
        );
    }

    /**
     * Удаление закладки
     *
     * @param User $user
     * @return int
     */
    public function removeBookmark(User $user): int
    {
        return $this
            ->bookmarks()
            ->where('user_id', $user->id)
            ->delete();
    }

}
