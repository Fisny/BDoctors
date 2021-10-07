<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    protected $with = ['specialization', 'reviews', 'messages', 'sponsorship'];

    public function specialization()
    {
        return $this->belongsToMany('App\Specialization');
    }

    public function sponsorship()
    {
        $currentDate = Carbon::now();
        return $this->belongsToMany('App\Sponsorship')->withTimestamps()->wherePivot('date_end', '>=', $currentDate);;
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
