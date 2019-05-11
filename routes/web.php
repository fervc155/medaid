<?php

use App\Notifications\Prueba;
use App\User;

//Rutas que requieren que el usuario que inició sesión sea administrador
Route::group(['middleware' => ['auth','admin'] ], function () {
	Route::resource('doctor', 'DoctorController');
    Route::resource('office', 'OfficeController');
});

//Rutas que sólo requieren que el usuario haya iniciado sesión
Route::group(['middleware' => 'auth'], function () {
    Route::resource('patient', 'PatientController');
    Route::patch('appointment/complete/{appointment}', 'AppointmentController@complete');
    Route::resource('appointment', 'AppointmentController');
});

//Página de inicio
Route::get('/', function () {
	//User::find(1)->notify(new Prueba);
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
