<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Car;
use App\Color;

class CarController extends Controller
{
    //
    public function showAddPage(){

        $colors = DB::table('colors')->select('*')->get();

        return view('add',compact('colors'));
    }

    public function saveCar(Request $req){

        $car = new Car;

        $car->fill([
            'brand' => $req->brand,
            'model' => $req->model,
            'doors' => $req->doors,
            'color_id' => $req->color,
            'kms'   => $req->kms,
            'state' => $req->state,
        ]);

        $car->save();

        $carArray = Car::all();

        return view('show',compact('carArray'));
    }

    public function show(){

        $carArray = Car::all();

        return view('show',compact('carArray'));
    }

    public function showEdit($id){
        $car = Car::findOrFail($id);
        $colors = DB::table('colors')->select('*')->get();

        return view('edit',compact('car','colors'));
    }

    public function edit(Request $req){

        DB::table('cars')->where('id',$req->id)->update([
            'brand' => $req->brand,
            'model' => $req->model,
            'doors' => $req->doors,
            'color_id' => $req->color,
            'kms'   => $req->kms,
            'state' => $req->state,
        ]);

        $carArray = Car::all();

        return view('show',compact('carArray'));
    }

    public function delete($id){
        
        $oneCar = DB::table('cars')->where('id',$id)->delete();;

        $carArray = Car::all();

        return view('show',compact('carArray'));
    }

}
