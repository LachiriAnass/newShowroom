<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaintingVote extends Model
{
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function painting()
    {
        return $this->belongsTo('App\Painting');
    }
}
