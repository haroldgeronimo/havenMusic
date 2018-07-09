<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Song extends Model
{
    use Taggable;

    protected $table = 'songs';

    public function tags(){
    return $this->tagNames(); 
    }

    public function composers(){
        return $this->belongsToMany('App\Person','persons_songs');
    }

    public function arrangements(){
        return $this->hasMany('App\Arrangement');
    }
}
