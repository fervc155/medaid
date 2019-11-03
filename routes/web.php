<?php

use App\Notifications\Prueba;
use App\User;

/////rutas web



Route::get('/visitante/especialidades','webController@especialidades');
Route::get('/visitante/especialidad/{id}','webController@especialidad');

Route::get('/visitante/consultorios','webController@consultorios');
Route::get('/visitante/consultorio/{id}','webController@consultorio');

Route::get('/visitante/doctor/{id}','webController@doctor');
Route::get('/visitante/doctores/','webController@doctores');
Route::get('/visitante/','webController@visitante');


Route::get('acerca','webController@acerca');
Route::get('contacto','webController@contacto');


///chat 

route::get('chat','chatController@index');

// especialidades

route::get('speciality','SpecialityController@index');
route::post('speciality/store','SpecialityController@store');
route::post('speciality/update','SpecialityController@update');
route::get('speciality/{id}','SpecialityController@show');

route::delete('speciality/store','SpecialityController@destroy');




///options

route::get('options','optionController@index');
route::post('options/user-default','optionController@userDefault');
route::post('options/moneda','optionController@moneda');
route::post('options/idioma','optionController@idioma');

/// bills

route::get('bills','BillController@index');





//Rutas que requieren que el usuario que inició sesión sea administrador
Route::group(['middleware' => ['auth','admin'] ], function () {
	Route::resource('doctor', 'DoctorController');
    Route::resource('office', 'OfficeController');
});

//Rutas que sólo requieren que el usuario haya iniciado sesión
Route::group(['middleware' => 'auth'], function () {
    Route::resource('patient', 'PatientController');
    Route::patch('appointment/complete/{appointment}', 'AppointmentController@complete');
    Route::patch('appointment/rejected/{appointment}', 'AppointmentController@rejected');
    Route::patch('appointment/accepted/{appointment}', 'AppointmentController@accepted');
    Route::patch('appointment/cancelled/{appointment}', 'AppointmentController@cancelled');

    Route::patch('appointment/pending/{appointment}', 'AppointmentController@pending');
    Route::patch('appointment/late/{appointment}', 'AppointmentController@late');
    Route::patch('appointment/lost/{appointment}', 'AppointmentController@lost');


    Route::resource('appointment', 'AppointmentController');

});

//Página de inicio
Route::get('/', function () {
    return view('welcome');
});

//Página para redireccionar a los que no son administradores
Route::get('/admin', function () {
    return view('admin');
});

//Rutas para autenticación de usuarios
Auth::routes();

//Home
Route::get('/home', 'HomeController@index')->name('home');
