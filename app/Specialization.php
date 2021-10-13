<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    public function user() {
        return $this->belongsToMany('App\User');
    }
}