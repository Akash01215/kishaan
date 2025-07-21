<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    // use HasFactory;

    protected $fillable = ['user_id', 'activity', 'ip_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
