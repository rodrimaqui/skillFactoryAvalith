<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\force;

class ForceController extends Controller
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

    //FORCES
    function getForcesApi(){        
        
        $response = $this->getApi("https://data.police.uk/api/forces");

        foreach(json_decode($response) as $aux){

            $force = new force;
            $force->fill([
                'force_id' => $aux->id,
                'name'  => $aux->name,
            ]);

            $force->save();
        }
    }

    function getForces(){        

        $force = force::all();

        return  response()->json($force);
    }
    
    
}
