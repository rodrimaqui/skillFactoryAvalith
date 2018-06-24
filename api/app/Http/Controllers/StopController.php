<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Stop;
class StopController extends Controller
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

    function getStopApi($force){

        
        $forces = DB::table('stops')->where('forces','=',$force)->get();
        

        if($forces == '[]'){
            
            $response = $this->getApi('https://data.police.uk/api/stops-force?force='.$force);

            foreach(json_decode($response) as $aux){

                $stop = new Stop;
                
                $stop->fill([
                   'age' => $aux->age_range,
                   'ethnicity' => $aux->self_defined_ethnicity,
                   'gender' => $aux->gender,
                   'legislation' => $aux->legislation,
                   'datetime' => $aux->datetime,
                   'type' => $aux->type,
                   'search' => $aux->object_of_search,
                   'forces' => $force,
                ]);

                $stop->save();
                
                $forces = DB::table('stops')->where('forces','=',$force)->get();
            }
        }else{
            $forces = DB::table('stops')->where('forces','=',$force)->get();
        }

        return response()->json($forces);
    }
}
