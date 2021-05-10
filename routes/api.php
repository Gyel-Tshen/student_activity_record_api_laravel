<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 1. get all (GET)
// 2. create a post (POST)
// 3. get a single (GET)
// 4. update a single (PUT/PATCH)
// 5. delete (DELETE)

//create route activity


//participation
Route::post('/participants', 'ParticipantController@store');

//Route::apiResource('users', 'ApiController');




//update
//Route::put('/activity/{id}')

//delete
//Route::delete('/activity/{id}')



// Route::get('/activity', function(){
//     $activity = Activity::create([



//     ])
//     return $activity;
// });




// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


//sign in and sign out

Route::namespace('Api')->group(function(){



    //Route::post('/register', 'UserController@register');
    //Route::post('/login', 'UserController@login');
    //Route::get('/user', 'UserController@getCurrentUser');
    //Route::post('/update', 'UserController@update');
    //Route::get('/logout', 'UserController@logout');
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');


    Route::middleware('auth:api')->group(function (){




        //Route::get('helloworld', 'AuthController@index');
        Route::put('update/{id}', 'AuthController@update');
        Route::post('logout', 'AuthController@logout');
        //Route::apiResource('activities', 'ActivityApiController');
        Route::post('change-password', 'AuthController@change_password');
        Route::get('showUserProfile', 'UserApiController@showUserProfile');
        Route::post('participateActivity', 'UserApiController@participate_activity');
        Route::post('activities', 'ActivityApiController@store');
        Route::post('participation', 'ActivityApiController@participate');
        //Route::put('/updateprofile/{id}', 'UserCOntroller@updateprofile');
        //oute::get('/activity', 'ActivityApiController@index');
        //Route::post('/addactivity', 'ActivityApiController@store');
        // Route::put('/activity', 'ActivityApiController@update');
        // Route::delete('/activity', 'ActivityApiController@destory');

    });

});
    //create user routes






