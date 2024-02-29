<?php 

namespace App\Http\Controllers\Api;

trait ApiResponseTrait
{
    public function apiresponse($data, $message, $status){

        $array =[
            'data'=>$data,
            'message' =>  $message,
            'status'=>$status
        ];
        return response( $array, $status);

    }
    
}
