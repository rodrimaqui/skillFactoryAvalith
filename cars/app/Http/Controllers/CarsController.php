<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Car;
use App\Color;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $carArray = Car::all();

        return view('show',compact('carArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $colors = DB::table('colors')->select('*')->get();

        return view('add',compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
        //
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

        // return view('show',compact('carArray'));
        return redirect()->route('/cars/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $car = Car::findOrFail($id);
        $colors = DB::table('colors')->select('*')->get();

         return view('edit',compact('car','colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        DB::table('cars')->where('id',$req->id)->update([
            'brand' => $req->brand,
            'model' => $req->model,
            'doors' => $req->doors,
            'color_id' => $req->color,
            'kms'   => $req->kms,
            'state' => $req->state,
        ]);

        $carArray = Car::all();

        // return view('show',compact('carArray'));
        return redirect('/cars/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $oneCar = DB::table('cars')->where('id',$id)->delete();;

        $carArray = Car::all();

        return redirect('/cars/');
    }

    /* APIS  */

    public function indexApi(){
        
        $carArray = Car::all();

        return  response()->json($carArray);
    }

    public function showApi($id){

        $car = Car::findOrFail($id);

        return response()->json($car);
    }
}
