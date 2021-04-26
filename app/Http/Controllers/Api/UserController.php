<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function update(Request $request, $id) {

        // Find the product
        $user = User::find($id);

        // Validate The form
        // Updating the product
        $user->update([
            'name' => $request->name,
            //'email' => $request->email,
            'course' => $request->course,
            'student_no' => $request->student_no
        ]);

        // Store a message in session
        //$request->session()->flash('msg', 'User has been updated');

        // Redirect
        $request->user()->token()->revoke();
        return response()->json([
            "user"=>$user
        ], 200);

    }

}
