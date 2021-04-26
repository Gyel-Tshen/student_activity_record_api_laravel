<?php

namespace App\Http\Controllers;
use App\User;
use App\Participant;
use App\Activity;

use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(){
    return view('admin.participants');
    }

    public function store($id){
        Participant::create([
            'user_id' => Auth::user()->id,
            'act_id' => $id,
        ]);
        return redirect()->back();
    }
}
