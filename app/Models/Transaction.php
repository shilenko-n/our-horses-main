<?php

namespace App\Models;

use App\Models\Traits\HasCard;
use App\Models\Traits\HasCurrency;
use App\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;


/**
 * Модель банковской транзакции
 *
 * @property int $id
 * @property Card $card
 * @property string $about
 * @property int $amount
 * @property Currency $currency
 *
 */
class Transaction extends Model
{
    use
        HasUser,
        HasCard,
        HasCurrency;

    protected $fillable = [
        'card_id',
        'about',
        'amount',
        'currency_id',
    ];
}
