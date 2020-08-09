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

// Hospital Users
Route::get('/hospital', 'HospitalsController@IndexHospital')->name('Hospitals Information');

Route::get('/hospital/{id}', 'HospitalsController@HospitalDetails')->name('HospitalDetails');

// Doctors Users
Route::get('/doctors', 'DoctorsController@IndexDoctor')->name('Doctor Information');

Route::get('/doctors/{id}', 'DoctorsController@DoctorDetails')->name('DoctorDetails');

// Drugs Users
Route::get('/drugs', 'DrugsController@IndexDrugs')->name('Drug Information');

Route::get('/drugs/{id}', 'DrugsController@DrugDetails')->name('DrugDetails');

// Patients Users
Route::get('/patients', 'PatientsController@IndexPatient')->name('Patient Information');

Route::get('/patients/{id}', 'PatientsController@PatientDetails')->name('PatientDetails');



//Admin

Route::GET('/admin/hospitals', 'HospitalsController@Index');

Route::GET('/admin/hospitals/create', 'HospitalsController@Create');

Route::POST('/admin/hospitals/create', 'HospitalsController@Hospital');

Route::GET('/admin/hospitals/edit/{id}', 'HospitalsController@Edit');

Route::POST('/admin/hospitals/edit', 'HospitalsController@Update');

Route::GET('/admin/hospitals/delete/{id}', 'HospitalsController@Delete');

Route::DELETE('/admin/hospitals/delete', 'HospitalsController@Remove');

Route::GET('/admin/hospitals/details/{id}', 'HospitalsController@Show');

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

Route::post('/admin/drugs/create', 'DrugsController@Drug');

Route::get('/admin/drugs/edit/{id}', 'DrugsController@Edit');

Route::post('/admin/drugs/edit', 'DrugsController@Update');

Route::get('/admin/drugs/delete/{id}', 'DrugsController@Delete');

Route::delete('/admin/drugs/delete', 'DrugsController@Remove');

Route::get('/admin/drugs/details/{id}', 'DrugsController@Show');

//Admin Patients
Route::get('/admin/patients', 'PatientsController@Index');

Route::get('/admin/patients/create', 'PatientsController@Create');

Route::post('/admin/patients/create', 'PatientsController@Patient');

Route::get('/admin/patients/edit/{id}', 'PatientsController@Edit');

Route::post('/admin/patients/edit', 'PatientsController@Update');

Route::get('/admin/patients/delete/{id}', 'PatientsController@Delete');

Route::delete('/admin/patients/delete', 'PatientsController@Remove');

Route::get('/admin/patients/details/{id}', 'PatientsController@Show');


Route::get('/hospitals/index', 'HomeController@index');
Route::get('/mongodb', function (){
    return view('mongodb');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
