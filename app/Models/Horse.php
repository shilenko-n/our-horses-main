<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
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
    ];
}
