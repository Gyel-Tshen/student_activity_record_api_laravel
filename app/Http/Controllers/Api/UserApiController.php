<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Mail;
use App\Mail\PasswordReset;

class UserApiController extends Controller
{
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUserProfile(User $user)
    {
        return response()->json(['message'=>null,'data'=>$user],200);
    }


    //User create a activity.
    public function participate_activity(Request $request, User $user, Activity $activity)
    {
        $note = '';
        if($request->note){
            $note = $request->note;
        }
        if($user->activity()->save($activity, array('note' => $note))){
            return response()->json(['message'=>'User Activity Created','data'=>$activity],200);
        }
        return response()->json(['message'=>'Error','data'=>null],400);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userActivity(User $user)
    {
        $activity = $user->activity;
        return response()->json(['message'=>null,'data'=>$activity],200);
    }




}



