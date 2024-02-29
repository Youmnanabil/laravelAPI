<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    use ApiResponseTrait;
    public function index(){

        $user = User::get();
        if($user){
            return $this->apiresponse($user, message:'Ok', status:200);
        }else{
            return $this->apiresponse(data:null, message:'not valid', status:404);
        }
    }

    public function store(Request $request){
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'fitness_goals'=>'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $data = $request->validator;

        User::create($data);
        if ($data){
            return $this->apiresponse($data, message:'Ok', status:201);
        }else{
            return $this->apiresponse(data:null, message:'user not saved in DB', status:400);
        }
    }


    public function update(Request $request, string $id){
        
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'fitness_goals'=>'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = $request->validator;
        $user['password']= Hash::make($request->password);
        User::where('id', $id)->update($user);
        
        if ($user){
            return $this->apiresponse($user, message:'Ok', status:201);
        }else{
            return $this->apiresponse(data:null, message:'user not saved in DB', status:400);
        }
    }
}
