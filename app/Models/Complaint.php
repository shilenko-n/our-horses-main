<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{

    protected $fillable = [
        'user_id',
        'complaint_topic_id',
        'body',
    ];

}
