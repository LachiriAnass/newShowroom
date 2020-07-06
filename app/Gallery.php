<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = [];

    public function paintings()
    {
        return $this->hasMany('App\Painting');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
