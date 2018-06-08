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

// Route::get('/', 'CarController@showAddPage');
// Route::post('/', 'CarController@saveCar');

// Route::get('/show','CarController@show');

// Route::get('/delete/{id}', 'CarController@delete');

// Route::get('/edit/{id}', 'CarController@showEdit');
// Route::post('/edit', 'CarController@edit');

Route::resource('cars','CarsController');

Route::get('/apiCars','CarsController@indexApi');
Route::get('/apiCars/{id}', 'CarsController@showApi');