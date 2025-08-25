<?php

namespace App\Models;

use App\Models\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Модель жалобы
 *
 * @property User $user
 * @property ComplaintTopic $complaintTopic
 * @property string $body
 */
class Complaint extends Model
{
    use HasUser;

    protected $fillable = [
        'user_id',
        'complaint_topic_id',
        'body',
    ];

    /**
     * Получение темы жалобы
     *
     * @return BelongsTo
     */
    public function complaintTopic(): BelongsTo
    {
        return $this->belongsTo(ComplaintTopic::class);
    }

}
