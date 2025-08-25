<?php

namespace App\Models;

use App\Models\Traits\HasReactions;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Collection|Reaction[] $reactions
 */
class Blog extends Model
{
    use HasReactions;

    protected $fillable = [
        'title',
        'user_id',
        'horse_id',
        'content'
    ];
}
