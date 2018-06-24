<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    //

    protected $fillable = ['category','location','month','status','forces'];
}
