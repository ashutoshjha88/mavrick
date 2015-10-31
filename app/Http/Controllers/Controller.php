<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * @param $status_error_msg
     * @param $data_to_send_in_json
     * @param $key
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendJson( $status_error_msg,  $data_to_send_in_json, $key){
        if( is_bool($data_to_send_in_json) && ! $data_to_send_in_json )
        {
            return response()->json(['error' => $status_error_msg ], 500);
        }

        if($key == 'array')
        {
            return response()->json($data_to_send_in_json);
        }

        // all good so return the success data
        return response()->json([$key => $data_to_send_in_json]);
    }
}
