<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

 

Route::post('/visitante/search-especialidades','API\\ApiController@searchespecialidades');
Route::post('/visitante/search-doctores/especialidad','API\\ApiController@searchDoctorEspecialidad');
Route::post('/visitante/search-doctores','API\\ApiController@searchDoctores')->name('api.search.doctors');

Route::get('/offices/doctors/{id}','API\\ApiController@get_officesDoctors');


// //calendario
Route::post('/appointment','API\\ApiController@getAppointment');
Route::post('/appointments/patient','API\\ApiController@getAppointmentPatient');
Route::post('/appointments/doctor','API\\ApiController@getAppointmentDoctor');




 
Route::group(['middleware' => 'auth'], function () {
   

    Route::post('appointment/gettime','API\\ApiController@AppointmentGetTime')->name('api.appointments.gettime');


});