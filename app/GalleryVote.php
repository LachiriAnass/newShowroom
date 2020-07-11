<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryVote extends Model
{

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }
}
