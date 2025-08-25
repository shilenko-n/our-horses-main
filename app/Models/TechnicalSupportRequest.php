<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnicalSupportRequest extends Model
{
    protected $fillable = [
        'user_id',
        'technical_support_request_topic_id',
        'content',
        'closed',
    ];
}
