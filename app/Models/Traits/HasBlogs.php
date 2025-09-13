<?php namespace App\Models\Traits;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasBlogs
{

    /**
     * Получение всех записей модели
     *
     * @return HasMany
     */
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
}
