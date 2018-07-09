<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Arrangement extends Model
{
    protected $table = 'arrangements';

    public function arrangers(){
        return $this->belongsToMany('App\Person','arrangments_persons');
    }

    public function song(){
        return $this->belongsTo('App\Song');
    }
}
