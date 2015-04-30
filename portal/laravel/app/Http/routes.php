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

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

// following routes are for training requests
Route::get('job/ctraining', 'OtherController@ctraining');
Route::post('job/ctraining', 'OtherController@storetraining');
Route::get('job/trg/{id}', 'OtherController@showtr');
Route::get('job/trg/{id}/edit', 'OtherController@edittr');
Route::PATCH('job/trg/{id}', 'OtherController@updatetr');
Route::get('job/trg/del/{id}', 'OtherController@deltr');

//following routes are for walkins requests
Route::get('job/cwalkins', 'OtherController@cwalkins');
Route::post('job/strwalkins', 'OtherController@storewalkins');
Route::get('job/wlk/{id}', 'OtherController@showwalk');
Route::get('job/wlk/{id}/edit', 'OtherController@editwalk');
Route::PATCH('job/wlk/{id}', 'OtherController@updatewalk');
Route::get('job/wlk/del/{id}', 'OtherController@delwalk');

//following routes are for preparation requests
Route::get('job/cprepare', 'OtherController@cprepare');
Route::post('job/strprepare', 'OtherController@storeprepare');
Route::get('job/prepare/{id}', 'OtherController@showprepare');
Route::get('job/prepare/{id}/edit', 'OtherController@editprepare');
Route::PATCH('job/prepare/{id}', 'OtherController@updateprepare');
Route::get('job/prepare/del/{id}', 'OtherController@delprepare');

//following routes are for consultancy requests
Route::get('job/ccons', 'OtherController@ccons');
Route::post('job/strcons', 'OtherController@storecons');
Route::get('job/cons/{id}', 'OtherController@showcons');
Route::get('job/cons/{id}/edit', 'OtherController@editcons');
Route::PATCH('job/cons/{id}', 'OtherController@updatecons');
Route::get('job/cons/del/{id}', 'OtherController@delcons');




Route::get('job/apply/{id}', 'JobsController@apply');
Route::get('job/usr/{id}/edit', 'JobsController@editprof');
Route::PATCH('job/usr/{id}', 'JobsController@updateusr');
Route::get('job/user/{id}', 'JobsController@uprofile');
Route::get('/job/Applye/{id}', 'JobsController@applye');
Route::get('/job/Applyu/{id}', 'JobsController@Applyu');
Route::get('job/openings', 'JobsController@openings');
Route::get('job/del/{id}', 'JobsController@deljob');
Route::get('job/walkins', 'JobsController@walkins');
Route::get('job/training', 'JobsController@training');
Route::get('job/consult', 'JobsController@consultancies');
Route::get('job/preparation', 'JobsController@preparation');
Route::resource('job','JobsController');




Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
