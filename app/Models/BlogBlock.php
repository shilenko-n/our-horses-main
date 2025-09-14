<?php

namespace App\Models;

use App\Enums\BlogBlockType;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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

    public function hasPreview(): bool
    {
        return $this->getMedia('images')->count() > 0;
    }

    public function getPreview(): Media
    {
        return $this->getFirstMedia('images');
    }

    protected $fillable = [
        'type',
        'content',
        'blog_id',
        'position',
        'title',
    ];
}
