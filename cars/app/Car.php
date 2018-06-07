<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['brand','model','doors','color_id','kms','state'];

    public function color(){
        return $this->belongsTo('App\Color');
    }
}
