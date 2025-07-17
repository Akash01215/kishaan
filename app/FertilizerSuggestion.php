<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FertilizerSuggestion extends Model
{
     protected $fillable = [
        'user_id', 'crop_name', 'nitrogen', 'phosphorus', 'potassium',
        'deficiency', 'suggested_action'
    ];
}
