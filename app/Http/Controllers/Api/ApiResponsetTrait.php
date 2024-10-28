<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;

trait ApiResponsetTrait
{
    public function apiResponse($data = null , $message = null , $status =null){
        $array = [
            'data'=>$data,
            'message'=>$message,
            'status'=>$status
        ];
            return response($array,$status);
    }

    public function Apivalidation( $data){
        $validator = Validator::make($data,[
            'name' => 'required',
            'price'  => 'required',

        ]);

        if($validator->fails()){
            return $this->ApiResponse(null , $validator->errors(),400);
           }
        return true ;
    }
}
