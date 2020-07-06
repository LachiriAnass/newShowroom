<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    protected $guarded = [];

    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }
}
