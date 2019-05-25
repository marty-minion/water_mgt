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
Route::resource('posts','PostsController');



Route::get('/', function () 
	//the '/' means home ie the home page
{
   return view('welcome');
   });