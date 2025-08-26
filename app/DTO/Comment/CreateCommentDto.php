<?php declare(strict_types=1);

namespace App\DTO\Comment;

use App\Models\Comment;
use App\Models\User;
use Spatie\LaravelData\Data;

/**
 * DTO для создания комментария
 *
 * @property User $user
 * @property string $content
 * @property Comment|null $replyTo
 */
class CreateCommentDto extends Data
{
    public function __construct(
        public User $user,
        public string $content,
        public ?Comment $replyTo = null,
    )
    {}

}
