<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

    public function paintings()
    {
        return $this->hasMany('App\Painting');
    }


    public function paintingvotes()
    {
        return $this->hasMany('App\PaintingVote');
    }

    public function profilevotes()  // the columns in common is id(users) and user_id(profile_votes)  !!!!!!!!not profile_id(profile_votes)!!!!!!!!
    {
        return $this->hasMany('App\ProfileVote');
    }
}
