<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileVote extends Model
{
    protected $guarded = [];

    public function profile()
    {
        return $this->belongsTo('App\User');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
