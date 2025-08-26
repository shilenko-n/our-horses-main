<?php namespace App\Models\Traits;

use App\Enums\ReactionType;
use App\Models\Reaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasReactions
{

    /**
     * Получение реакций
     *
     * @return MorphMany
     */
    public function reactions(): MorphMany
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }

    /**
     * Поставить реакцию
     *
     * @param User $user
     * @param ReactionType $reactionType
     * @return Reaction
     */
    public function react(User $user, ReactionType $reactionType): Reaction
    {
        return $this->reactions()->updateOrCreate(
           ['user_id' => $user->id],
           ['type' => $reactionType->value],
        );
    }

    /**
     * Удалить реакцию
     *
     * @param User $user
     * @return int
     */
    public function removeReaction(User $user): int
    {
        return $this->reactions()->where('user_id', $user->id)->delete();
    }

}
