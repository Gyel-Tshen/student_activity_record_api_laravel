<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Activity;
use App\Http\Controllers\Controller;
use App\Participation;

class ActivityApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all activity
        $activity = auth()->user()->activity;

        return response()->json([
            'success' => true,
            'data' => $activity
          ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create a post
        $activity = new Activity();
        $activity -> activity_name = $request->activity_name;
        $activity -> activity_type = $request->activity_type;
        $activity -> activity_category = $request->activity_category;
        $activity -> activity_year = $request->activity_year;
        $activity -> activity_semester = $request->activity_semester;

        if(auth()->user()->activities()->save($activity)){

            return response()->json(
                $activity,201);



        }else {
            return response()->json([
                'data'=> 'activity null',
                'msg' => 'Unable to created'
            ],500);
        }



        //return Activity::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show a activity
        $activity = auth()->user()->activities()->find($id);

       if(!$activity){
           return response()->json([
            'success' => false,
           'data' => 'Activity with id' . $id . 'not found',
        ], 204);
       }

       return response()->json([
           'success' => true,
           'data' => $activity->toArray(),
       ], 200);

        //return Activity::find($id);
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {
        //update activity
        $activity = auth()->user()->activities()->find($id);

        if(!$activity){
            return response()->json([
                    'success' => false,
                    'data' => 'Activity with id'. $id . 'not found',
            ], 500);
        }

        $updated = $activity->fill($request->all())->save();

        if($updated){
            return response()->json([
                    'success' => true,
                    'message' => 'activity updated successfully',
            ], 202);
        }else{
            return response()->json([
                    'success' => false,
                    'message' => 'activity could not be updated',
            ], 500);
        }
    }



    public function participate(Request $request){

        $participant = new Participation();
        $participant -> user_id = $request->user_id;
        $participant -> activity_id = $request->activity_id;

        $participant->save();
            return response()->json(
                $participant,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete a activity

        $activity = auth()->user()->activities()->find($id);

        if (!$activity){
            return response()->json([
                    'success' => false,
                    'message' => 'activity with id'. $id . 'not found'
            ], 400);
        }

        if($activity->delete()){
            return response()->json([
                    'success' => true,
                    'message' => "activity deleted successfully"
            ]);
        }else{
            return response()->json([
                    'success' => false,
                    'message' => 'activity could not be deleted'
            ], 500);
        }
    }

}

