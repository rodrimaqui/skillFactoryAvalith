<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Car;

class CarController extends Controller
{
    //
    public function showAddPage(){
        return view('add');
    }

    public function saveCar(Request $req){

        $car = new Car;

        $car->fill([
            'brand' => $req->brand,
            'model' => $req->model,
            'doors' => $req->doors,
            'color' => $req->color,
            'kms'   => $req->kms,
            'state' => $req->state,
        ]);

        $car->save();

        $carArray = DB::table('cars')->select('*')->get();

        return view('show',compact('carArray'));
    }

    public function show(){
        $carArray = DB::table('cars')->select('*')->get();

        return view('show',compact('carArray'));
    }

    public function showEdit($id){
        $car = DB::table('cars')->find($id);

        return view('edit',compact('car'));
    }

    public function edit(Request $req){

        DB::table('cars')->where('id',$req->id)->update([
            'brand' => $req->brand,
            'model' => $req->model,
            'doors' => $req->doors,
            'color' => $req->color,
            'kms'   => $req->kms,
            'state' => $req->state,
        ]);

        $carArray = DB::table('cars')->select('*')->get();

        return view('show',compact('carArray'));
    }

    public function delete($id){
        
        $oneCar = DB::table('cars')->where('id',$id)->delete();;

        $carArray = DB::table('cars')->select('*')->get();

        return view('show',compact('carArray'));
    }

}
