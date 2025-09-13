<?php

namespace App\Models;

use App\Enums\BlogBlockType;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель блока записи
 *
 * @property BlogBlockType $type
 * @property string $content
 * @property Blog $blog
 * @property int $position
 */
class BlogBlock extends Model
{
    protected $fillable = [
        'type',
        'content',
        'blog_id',
        'position',
    ];
}
