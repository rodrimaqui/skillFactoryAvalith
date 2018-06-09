<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Color extends Model
{
    //
    protected $fillable = ['name'];

    public function cars(){
        return $this->hasMany('App\Car');
    }

    public function allColors(){

        return  DB::table('colors')->select('*')->get();
    }
}