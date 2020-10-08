<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    protected $guarded = [];

    public function paintingvotes()
    {
        return $this->hasMany('App\PaintingVote');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
