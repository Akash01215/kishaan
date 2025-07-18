<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiseaseReport extends Model
{
     protected $fillable = [
        'user_id', 'crop_name', 'disease_detected',
        'image_path', 'cure_suggestion', 'submitted_at'
    ];
}
