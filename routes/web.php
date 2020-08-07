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

Route::get('/hospitals', function () {
    return view('hospitals');
});

//Admin

Route::get('/admin/hospitals', 'HospitalsController@Index');

Route::get('/admin/hospitals/create', 'HospitalsController@Create');

Route::post('/admin/hospitals/create', 'HospitalsController@Hospital');

Route::get('/admin/hospitals/edit/{id}', 'HospitalsController@Edit');

Route::post('/admin/hospitals/edit', 'HospitalsController@Update');

Route::get('/admin/hospitals/delete/{id}', 'HospitalsController@Delete');

Route::delete('/admin/hospitals/delete', 'HospitalsController@Remove');

Route::get('/admin/hospitals/details/{id}', 'HospitalsController@Show');

//Admin Doctors
Route::get('/admin/doctors', 'DoctorsController@Index');

Route::get('/admin/doctors/create', 'DoctorsController@Create');

Route::post('/admin/doctors/create', 'DoctorsController@Doctor');

Route::get('/admin/doctors/edit/{id}', 'DoctorsController@Edit');

Route::post('/admin/doctors/edit', 'DoctorsController@Update');

Route::get('/admin/doctors/delete/{id}', 'DoctorsController@Delete');

Route::delete('/admin/doctors/delete', 'DoctorsController@Remove');

Route::get('/admin/doctors/details/{id}', 'DoctorsController@Show');

//Admin Drugs
Route::get('/admin/drugs', 'DrugsController@Index');

Route::get('/admin/drugs/create', 'DrugsController@Create');

Route::post('/admin/drugs/create', 'DrugsController@Doctor');

Route::get('/admin/drugs/edit/{id}', 'DrugsController@Edit');

Route::post('/admin/drugs/edit', 'DrugsController@Update');

Route::get('/admin/drugs/delete/{id}', 'DrugsController@Delete');

Route::delete('/admin/drugs/delete', 'DrugsController@Remove');

Route::get('/admin/drugs/details/{id}', 'DrugsController@Show');


Route::get('/hospitals/index', 'HomeController@index');
Route::get('/mongodb', function (){
    return view('mongodb');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
