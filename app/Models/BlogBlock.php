<?php

namespace App\Models;

use App\Enums\BlogBlockType;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Модель блока записи
 *
 * @property BlogBlockType $type
 * @property string $content
 * @property Blog $blog
 * @property int $position
 */
class BlogBlock extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');
    }

    protected $fillable = [
        'type',
        'content',
        'blog_id',
        'position',
    ];
}
