<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Crime;

class CrimeController extends Controller
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
            echo "cURL Error #:" . $err;
        } else {
            // print_r(json_decode($response));           
            return $response;
        }

    }

    function getCrimeApi($force,$category){
        
        $dates = $this->getCrime($force,$category);

        if($dates == '[]'){

             $response = $this->getApi('https://data.police.uk/api/crimes-no-location?category='.$category.'&force='.$force);
            
             foreach(json_decode($response) as $aux){
             $crime = new Crime;
             $crime->fill([
                 'category' => $aux->category,
                 'location' => $aux->location,
                 'month' => $aux->month,
                 'status' => $aux->outcome_status->category,
                 'forces' => $force,

             ]);
                
              $crime->save();

              $dates = $this->getCrime($force,$category);
            }
        }
        return response()->json($dates);
    }

    function getCrime($force, $category){
        if($category == 'all-crime'){
            $dates = DB::table('crimes')->where('forces','=',$force)->get();

        }else{
            $dates = DB::table('crimes')->where('forces','=',$force)->where('category','=',$category)->get();
        }

        return $dates;
    }
}
