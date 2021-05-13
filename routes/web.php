<?php
/*
 * Admin Routes
 */
Route::prefix('admin')->group(function() {

    Route::middleware('auth:admin')->group(function() {
        // Dashboard
        Route::get('/', 'DashboardController@index');

        // Products
        Route::resource('/activity', 'ActivityController');

        // Users
        Route::resource('/users','UsersController');

        Route::get('/participants','ParticipantController@index');

        Route::get('/add', 'UsersController@add');

        Route::post('/addnew', 'UsersController@addnew');

        Route::post('/importcsv', 'UsersController@importbulk');
        // Logout
        Route::get('/logout','AdminUserController@logout');

    });

    // Admin Login
    Route::get('/login', 'AdminUserController@index');
    Route::post('/login', 'AdminUserController@store');
});

Route::get('/', 'AdminUserController@index');
