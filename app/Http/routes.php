<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// start route signin, signup, restpassword
Route::get('page/signin', 'PageController@signin');
Route::post('page/signin', 'Auth\AuthController@postLogin');
Route::get('page/signintype2', 'PageController@signinType2');
//Route::get('page/signup', 'PageController@signup');
//Route::post('page/signup', 'Auth\AuthController@postRegister');
Route::get('page/lost-password', 'PageController@lostPassword');
Route::post('page/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::get('page/signout', 'PageController@signout');
// end route signin, signup, restpassword



Route::group(['middleware' => 'auth'], function () {
    // default public route
    Route::get('/', 'DashboardController@index');

    // dashboard route
    Route::get('dashboard/index', 'DashboardController@index');
    Route::get('dashboard/visitors', 'DashboardController@getVisitorsByYear');
    Route::get('dashboard/lock-screen', 'PageController@lockScreen');
    // end page route


    Route::get('/racer/index', 'RacerController@getIndex');
    Route::get('/racer/data', 'RacerController@anyData');
    Route::get('/racer/create', 'RacerController@create');
    Route::post('/racer/store', 'RacerController@store');
    Route::post('/racer/delete', 'RacerController@destroy');
    Route::post('/racer/edit', 'RacerController@edit');

});
