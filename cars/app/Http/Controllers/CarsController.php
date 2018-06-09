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
        $car = new Car;

        $carArray = $car->allCars();
        
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
        $color = new Color;

        $colors = $color->allColors();

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

        return redirect('cars');
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

        $car = Car::findOrFail($id);

        return response()->json($car);
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

        $carO = new Car;
        $color = new Color;

        $car = $carO->oneCar($id);
        $colors = $color->allColors();

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
        $car = new Car;

        $car->updateCar($req,$id);

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
        $car = new Car;

        $car->removeCar($id);

        return redirect('/cars/');
    }

    /* APIS  */

    public function indexApi(){

        $car = new Car;

        return  response()->json($car->allCars());
    }

    public function showApi($id){

        $car = new Car;

        return response()->json($car->oneCar($id));
    }
}
