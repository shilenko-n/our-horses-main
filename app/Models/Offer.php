<?php

namespace App\Models;

use App\Enums\OfferStatusType;
use App\Models\Traits\HasCurrency;
use App\Models\Traits\HasHorse;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель предложения/аренды лошади
 *
 * @property int $id
 * @property Horse $horse
 * @property Currency $currency
 * @property int $price
 * @property string $description
 * @property string|null $whatsapp
 * @property string|null $viber
 * @property string|null $email
 * @property string|null $vk
 * @property string|null $telegram
 * @property OfferStatusType $status
 */
class Offer extends Model
{
    use
        HasHorse,
        HasCurrency;

    protected $fillable = [
        'horse_id',
        'price',
        'currency_id',
        'description',
        'whatsapp',
        'viber',
        'email',
        'vk',
        'telegram',
        'status'
    ];
}
