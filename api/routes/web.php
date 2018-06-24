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

Route::get('forcesApi','ForceController@getForcesApi');
Route::get('forces','ForceController@getForces');

Route::get('categoriesCrimeApi', 'CategoriesCrimeController@getCategoriesCrimeApi');
Route::get('categoriesCrime', 'CategoriesCrimeController@getCategoriesCrime');

Route::get('crimeApi/{force}/{category}','CrimeController@getCrimeApi');

Route::get('stop/{force}','StopController@getStopApi');

