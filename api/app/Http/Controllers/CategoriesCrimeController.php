<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriesCrime;

class CategoriesCrimeController extends Controller
{
    //
    function getApi($url){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            // print_r(json_decode($response));           
            return $response;
        }

    }

    function getCategoriesCrimeApi(){

        CategoriesCrime::truncate();

        $response = $this-> getApi("https://data.police.uk/api/crime-categories");

        foreach(json_decode($response) as $aux){

            $category = new CategoriesCrime;

            $category->fill([
                'url' => $aux->url,
                'name' => $aux->name,
            ]);

            $category->save();
        }

    }

    function getCategoriesCrime(){

        $categories = CategoriesCrime::all();

        return response()->json($categories);
    }

    
    
}
