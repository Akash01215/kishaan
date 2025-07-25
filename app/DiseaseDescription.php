<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiseaseDescription extends Model
{
    protected $fillable = ['label', 'title', 'description', 'treatment', 'confidence', 'image_path'];
}
