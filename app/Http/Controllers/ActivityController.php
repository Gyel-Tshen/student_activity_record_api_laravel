<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ActivityController extends Controller
{
    public function index() {

        $activities = Activity::all();

        return view('admin.activity.index', compact('activities'));
    }

    public function create() {
        $activity = new Activity();
        return view('admin.activity.create', compact('activity'));
    }

    public function store(Request $request) {

        // Validate the form
        $request->validate([
           'activity_name' => 'required',
           'activity_type' => 'required',
           'activity_category' => 'required',
           'activity_date' => 'required',

        ]);

        Activity::create([
            'activity_name' => $request->activity_name,
            'activity_type' => $request->activity_type,
            'activity_category' => $request->activity_category,
            'activity_date' => $request->activity_date,

        ]);

        // Sessions Message
        $request->session()->flash('msg','Your Activity has been added');

        // Redirect

        return redirect('admin/activity/create');

    }

    public function edit($id) {
        $activity = Activity::find($id);
        return view('admin.activity.edit', compact('activity'));
    }

    public function update(Request $request, $id) {

        // Find the product
        $activities = Activity::find($id);

        // Validate The form
        $request->validate([
            'activity_name' => 'required',
            'activity_type' => 'required',
            'activity_category' => 'required',
            'activity_date' => 'required',

        ]);
        // Updating the product
        $activities->update([
            'activity_name' => $request->activity_name,
            'activity_type' => $request->activity_type,
            'activity_category' => $request->activity_category,
            'activity_date' => $request->activity_date,
        ]);

        // Store a message in session
        $request->session()->flash('msg', 'Activity has been updated');

        // Redirect
        return redirect('admin/activity');

    }

    public function show($id) {
        $activity = Activity::find($id);
        return view('admin.activity.details', compact('activity'));
    }

    public function destroy($id) {
        // Delete the product
        Activity::destroy($id);

        // Store a message
        session()->flash('msg','Activity has been deleted');

        // Redirect back
        return redirect('admin/activity');


    }
}
