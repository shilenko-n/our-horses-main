<?php namespace App\Models\Traits\Horse;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasOwners
{

    /**
     * Все владельцы
     *
     * @return BelongsToMany
     */
    public function owners(): BelongsToMany
    {
        return $this
            ->belongsToMany(User::class)
            ->withPivot('ownership_start', 'ownership_end');
    }

    public function currentOwner(): Model|User
    {
        return $this
            ->owners()
            ->wherePivot('ownership_end', null)
            ->first();
    }

    public function previousOwners(): BelongsToMany
    {
        return $this
            ->owners()
            ->wherePivot('ownership_end', '!=', null);
    }

}
