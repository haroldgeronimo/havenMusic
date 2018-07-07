<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    public function songs(){
        return $this->belongsToMany('App\Song','persons_songs');
    }
    //
}
