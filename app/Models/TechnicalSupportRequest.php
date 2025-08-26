<?php

namespace App\Models;

use App\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель запроса технической поддержки
 *
 * @property int $id
 * @property User $user
 * @property TechnicalSupportRequestTopic $technicalSupportRequestTopic
 * @property string $content
 * @property boolean $closed
 */
class TechnicalSupportRequest extends Model
{
    use HasUser;

    protected $fillable = [
        'user_id',
        'technical_support_request_topic_id',
        'content',
        'closed',
    ];
}
