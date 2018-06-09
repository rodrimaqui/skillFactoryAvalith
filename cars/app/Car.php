<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    protected $fillable = ['brand','model','doors','color_id','kms','state'];

    public function color(){
        return $this->belongsTo('App\Color');
    }

    public function allCars(){
       
       $cars = Car::all();
       
        return $cars;
    }

    public function oneCar($id){

        $car = Car::findOrFail($id);
        return $car;
    }

    public function updateCar($req, $id){

        DB::table('cars')->where('id',$req->id)->update([
            'brand' => $req->brand,
            'model' => $req->model,
            'doors' => $req->doors,
            'color_id' => $req->color,
            'kms'   => $req->kms,
            'state' => $req->state,
        ]);
    }

    public function removeCar($id){

        $oneCar = DB::table('cars')->where('id',$id)->delete();
    }
}
