<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['name', 'lastname', 'email', 'text', 'avatar', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
