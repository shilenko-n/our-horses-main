<?php

namespace App\Models;

use App\Models\Traits\HasBookmarks;
use App\Models\Traits\HasLocation;
use App\Models\Traits\HasOffers;
use App\Models\Traits\HasReactions;
use App\Models\Traits\HasSubscriptions;
use App\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Модель лошади
 *
 * @property Collection|Reaction[] $reactions
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property User $user
 * @property City $city
 * @property string $chipNumber
 * @property string $birthday
 * @property string $deathday
 * @property string $birthPlace
 * @property bool $moderating
 * @property bool $draft
 */
class Horse extends Model implements HasMedia
{
    use
        HasFactory,
        HasLocation,
        HasReactions,
        HasUser,
        HasSubscriptions,
        HasBookmarks,
        HasOffers,
        InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'city_id',
        'chip_number',
        'birthday',
        'deathday',
        'birth_place',
        'father_id',
        'mother_id',
        'purchase_date',
        'height_withers',
        'gender',
        'horse_breed_id',
        'horse_color_id',
        'horse_specialization_id',
        'moderating',
        'draft'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('docs');

        $this
            ->addMediaCollection('images');
    }

    // Horse Properties

    /**
     * Порода лошади
     *
     * @return BelongsTo
     */
    public function horseBreed(): BelongsTo
    {
        return $this->belongsTo(HorseBreed::class);
    }

    /**
     * Масть лошади
     *
     * @return BelongsTo
     */
    public function horseColor(): BelongsTo
    {
        return $this->belongsTo(HorseColor::class);
    }

    /**
     * Специализация лошади
     *
     * @return BelongsTo
     */
    public function horseSpecialization(): BelongsTo
    {
        return $this->belongsTo(HorseSpecialization::class);
    }

    public function scopeDraft($query)
    {
        return $query
            ->where('draft', true);
    }

    public function scopeModerating($query)
    {
        return $query
            ->where('moderating', true);
    }

    public function scopePublished($query)
    {
        return $query
            ->where([
                'moderating' => false,
                'draft' => false,
            ]);
    }

}
