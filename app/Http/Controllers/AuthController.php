<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Register(Request $request){

       $Validation =  $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed',
          ]);

          $user = User::create([
              'name'=>$Validation['name'],
              'email'=>$Validation['email'],
              'password'=>bcrypt($fields['password'])
          ]);

          $token = $user->createToken('UserToken')->plainTextToken;

          $response =[
              "user" => $user,
              "token" => $token
          ];

          return response($response,201);

    }

    public function Login(Request $request){

          $Validation = $request->validate([
            'email'=>'required|string',
            'password'=>'required|string',
          ]);

          $user = User::where('email',$Validation['email'])->first();

          if($user){

                if(Hash::check($Validation['password'], $user->password)){

                       $token = $user->createToken('User Token')->plainTextToken;

                       $response =[
                        "user" => $user,
                        "token" => $token
                    ];

                    return response($response,201);

                }else{
                    return response(["message"=>"Password Did not match"],401);
                }

          }else{
            return response(["message"=>"User Name not Found"],401);
          }

    }

    public function Logout(Request $request){
        auth()->user()->tokens()->delete();

        return ["message"=>"Logged OUT"];
    }
}
