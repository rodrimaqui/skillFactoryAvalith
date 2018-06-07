<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $fillable = ['name'];

    public function cars(){
        return $this->hasMany('App\Car');
    }
}