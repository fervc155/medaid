<?php

use App\Notifications\Prueba;
use App\User;

/*===========================
=            WEB            =
===========================*/






Route::get('/visitante/citas','webController@citas');
Route::get('/visitante/especialidades','webController@especialidades');

Route::get('/visitante/especialidad/{id}','webController@especialidad');

Route::get('/visitante/consultorios','webController@consultorios');
Route::get('/visitante/consultorio/{id}','webController@consultorio');

Route::get('/visitante/doctor/{id}','webController@doctor');
Route::get('/visitante/doctores/','webController@doctores');
Route::get('/visitante/','webController@visitante');


Route::get('acerca','webController@acerca');
Route::get('contacto','webController@contacto');


/*=====  End of WEB  ======*/


/*===========================
=            API            =
===========================*/


Route::post('/visitante/search-especialidades','API\\ApiController@searchespecialidades');
Route::post('/visitante/search-doctores/especialidad','API\\ApiController@searchDoctorEspecialidad');
Route::post('/visitante/search-doctores','API\\ApiController@searchDoctores');
Route::post('/visitante/search-citas','API\\ApiController@searchCitas');


/*=====  End of API  ======*/

/*============================
=            CHAT            =
============================*/





route::get('chat','chatController@index');

/*=====  End of CHAT  ======*/


/*======================================
=            ESPECIALIDADES            =
======================================*/





route::get('speciality','SpecialityController@index');
route::post('speciality/store','SpecialityController@store');
route::post('speciality/update','SpecialityController@update');
route::get('speciality/{id}','SpecialityController@show');

route::delete('speciality/store','SpecialityController@destroy');


/*=====  End of ESPECIALIDADES  ======*/


/*================================
=            OPCIONES            =
================================*/





route::get('options','optionController@index');
route::post('options/user-default','optionController@userDefault');
route::post('options/moneda','optionController@moneda');
route::post('options/idioma','optionController@idioma');

/*=====  End of OPCIONES  ======*/


/*================================
=            FACTURAS            =
================================*/




route::get('bills','BillController@index');


/*=====  End of FACTURAS  ======*/



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


//api


    Route::post('api/appointment/gettime','API\\ApiController@AppointmentGetTime');


    Route::resource('appointment', 'AppointmentController');

    /*----------  comments  ----------*/
    

    Route::post('/appointment/comment/register','Appointment_commentController@register');
    Route::post('/appointment/comment/delete','Appointment_commentController@destroy');
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
