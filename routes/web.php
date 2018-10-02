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

Route::get('/', function () {
    if (Auth::check())

   {
       return view('app.home');

   } else{
       return view('auth.login');

   }
});

Auth::routes();

Route::name('admin')->group(function () {

    Route::get('/clerk/add', 'HomeController@AddClerkPage')->name('AddClerkPage');
    Route::post('/clerk/add', 'HomeController@AddClerk')->name('AddClerk');

    Route::get('doctor/add', 'HomeController@AddDoctorPage')->name('AddDoctorPage');
    Route::post('/doctor/add', 'HomeController@AddDoctor')->name('AddDoctor');

    Route::get('/clinic/add', 'HomeController@AddClinicPage')->name('AddClinicPage');
    Route::post('/clinic/add', 'HomeController@AddClinic')->name('AddClinic');
    
});


Route::get('/patient/add', 'HomeController@AddPatientPage')->name('AddPatientPage');
Route::post('/patient/add', 'HomeController@AddPatient')->name('AddPatient');
Route::post('/patient/addto', 'HomeController@AddToPatient')->name('AddPatient');


Route::get('/appointment', 'HomeController@AddAppointmentPage')->name('AddAppointmentPage');
Route::get('/appointment/show/{id}', 'HomeController@ShowAppointment')->name('ShowAppointment');
Route::post('/appointment/edit/{id}', 'HomeController@EditAppointment')->name('EditAppointment');
Route::post('/appointment/search', 'HomeController@SearchAppointment')->name('EditAppointment');


Route::get('/patient/Search/', 'HomeController@Search')->name('Search');
 

