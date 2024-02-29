<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmailVerficationRequest;
use Illuminate\Http\Request;
use Otp;
use App\Models\User;
class EmailVerficationController extends Controller
{
    private $otp;
    public function __construct(){
        $this->otp = new Otp;
    }
    public function verify(EmailVerficationRequest $request){
        
        $otp1 = $this->otp->validate($request->email, $request->otp);
        if(!$otp1->status){
            return response()->json(['error' =>$otp1], 401);
        }
        $user= User::where('email',$request->email )->first();
        $user->update(['email_verified_at' =>now()]);
        $success['success'] = true;
        
        return response()->json($success, 200);
   
    }
}
