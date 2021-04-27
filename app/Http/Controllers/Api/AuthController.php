<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){

        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
            //chehck email
        $user = User::where('email', $fields['email'])->first();
        //chechk password

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Bad credintials'
            ], 401);

        }

        $token = $user->createToken('myapptoken');//->accessToken;
        $user->token = $token->accessToken;
        //$response = $user
            //'user' => $user,
            //'token' => $token
        //;
        return response($user, 200);



        // $credentials = request(['email', 'password']);

        // if(!Auth::attempt($credentials)){
        //     return response()->json([
        //         'message'=> 'Invalid email or password'
        //     ], 401);
        // }

        // $user = $request->user();

        // $token = $user->createToken('Access Token');

        // $user->access_token = $token->accessToken;

        // return response()->json(
        //     $user
        // , 200);
    }

    public function signup(Request $request){

        $request->validate([
            //'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            //'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
            "message" => "User registered successfully"
        ], 201);

    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            "message"=>"User logged out successfully"
        ], 200);
    }
}
