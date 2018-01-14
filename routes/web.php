<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
    Auth::routes();
    Route::get('/', function () {
        return view('auth/login');
    })->middleware('guest');
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('/dashboard', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    Route::get('/profile/form', 'ClientController@showProfileForm');

    Route::post('profile_send', 'ClientController@profileUpdate');

    Route::get('/client/pledge/new', 'PledgeController@showForm');
    Route::post('pledge_new', 'PledgeController@store');
    Route::get('/client/pledges', 'PledgeController@index');

    Route::delete('/pledge_delete', 'PledgeController@destroy');

    Route::get('/client/matches', 'MatchController@index');
    Route::get('/client/match', 'MatchController@showMatches');
    Route::get('/client/match/new', 'MatchController@showMatchForm');

    Route::post('match_create', 'MatchController@storeMatches');


    Route::get('/match/confirm/{id}/id', 'MatchController@confirmMatch');
    Route::delete('/match_delete', 'MatchController@destroy');

    Route::get('match_sms', 'MatchController@firesms');

//

});
