<?php

namespace App\Http\Controllers;
use App\User;
//use App\Order;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }


    public function create() {
        $users = new User();
        return view('admin.user.create', compact('user'));
    }

    public function store(Request $request) {

        // Validate the form
        $request->validate([
           'email' => 'required',
           'password' => 'required'

        ]);

        User::create([
            //'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id'=> $request->role_id,


        ]);

        // Sessions Message
        $request->session()->flash('msg','User has been added');

        // Redirect

        return redirect('admin/user/create');

    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id) {

        // Find the product
        $user = User::find($id);

        // Validate The form
        $request->validate([
            'name' => 'required',
            'course' => 'required',
            'student_no' => 'required',

        ]);
        // Updating the product
        $user->update([
            'name' => $request->name,
            'course' => $request->course,
            'student_no' => $request->student_no
        ]);

        // Store a message in session
        $request->session()->flash('msg', 'User has been updated');

        // Redirect
        return redirect('admin/user');

    }


    public function show($id) {

        // Find the user
        $orders = Order::where('user_id', $id)->get();

        // Return array back to user details page

        return view('admin.users.details', compact('orders'));

    }
    public function add(){
        return view('admin.users.register');
    }
    public function addnew(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'

        ]);
        User::create([
            'email' => $request->email,
            'password'=>bcrypt($request->password),
            'role' => $request->role,
        ]);
        return back()->with('msg', 'User Added!');
    }
}
