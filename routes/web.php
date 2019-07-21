<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


	
Route::view('contact','contactus');
Route::view('services','services');
#Route::resource('posts','PostsController');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//pipes urls
Route::post('/pipe/register', 'pipeController@registerNewPipe')->name('pipe_register');
Route::get('/pipe/register', 'pipeController@registerNewPipeGet')->name('pipe_register_get');
Route::post('/pipe/update', 'pipeController@updatePipe')->name('pipe_update');
Route::get('/pipe/update', 'pipeController@updatePipeGet')->name('pipe_update_get');
Route::get('/pipe/get_data/{pipe_id}', 'pipeController@getMeasureInstanceList')->name('get_sensors_for_a_pipe');
Route::get('/pipe/get_data/{pipe_id}/{measure_instance}', 'pipeController@getSensorsForThisPipe')->name('get_measure_instance_data');

//sensors urls
Route::post('/sensors/data', 'sensorController@storeSensorData')->name('getAllSensorsData');
Route::get('/sensors/data/{sensor_id}', 'sensorController@getASpecificSensorsData')->name('getASpecificSensorsData');


//the '/' means home ie the home page
Route::get('/','index@index');