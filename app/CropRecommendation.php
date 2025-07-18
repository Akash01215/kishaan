<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CropRecommendation extends Model
{protected $fillable = [
        'user_id', 'nitrogen', 'phosphorus', 'potassium',
        'city', 'state', 'recommended_crop'
    ];
}
