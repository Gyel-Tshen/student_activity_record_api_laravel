<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index() {
        $user = new User();

        return view('admin.dashboard', compact('user'));
    }

}
