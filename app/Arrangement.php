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

    public function files(){
        return $this->hasMany('App\File');
    }
   
        public function music(){
            return $this->hasMany('App\File')->whereIn('type',array('mp3','ogg'));
        }
        public function documents(){
            return $this->hasMany('App\File')->whereIn('type',['pdf','doc','docx']);
        }
        public function others(){
            return $this->hasMany('App\File')->whereNotIn('type',['mp3','ogg','pdf','doc','docx']);
        }
    
}
