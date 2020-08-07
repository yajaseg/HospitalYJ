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

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/contactus', function () {
    return view('contactus');
});


Route::get('/admin/hospitals', 'HospitalsController@Index');


Route::get('/admin/hospitals/create', 'HospitalsController@Create');

Route::get('/admin/hospitals/edit/{id}', 'HospitalsController@Edit');

Route::post('/admin/hospitals/edit', 'HospitalsController@Update');

Route::get('/admin/hospitals/delete/{id}', 'HospitalsController@Delete');

Route::get('/admin/hospitals/details/{id}', 'HospitalsController@Show');


Route::get('/mongodb', function (){
    return view('mongodb');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
