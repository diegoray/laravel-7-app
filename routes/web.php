<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('home');
});

Route::get('classes', 'ClassController@data');
Route::get('classes/add', 'ClassController@add');
Route::post('classes', 'ClassController@addProcess');
Route::get('classes/edit/{id}', 'ClassController@edit');
Route::patch('classes/{id}', 'ClassController@editProcess');
Route::delete('classes/{id}', 'ClassController@delete');

Route::resource('destinations', 'DestinationController');