<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    public function user() {
        return $this->belongsToMany('App\User');
    }
}
