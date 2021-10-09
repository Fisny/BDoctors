<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_name', 'vote', 'text', 'avatar', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
