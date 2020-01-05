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





/*====================================
=            AUTH PATIENT            =
====================================*/


Route::group(['middleware' => ['auth','patient'] ], function () {

    Route::resource('appointment', 'AppointmentController');          
    
    Route::get('appointment/create/{id_doctor}','AppointmentController@create');

    Route::get('appointment/create','AppointmentController@create');
    Route::get('doctor', 'DoctorController@index');
    Route::get('doctor/{id}', 'DoctorController@show');
    Route::resource('office', 'OfficeController');

    Route::get('patient/{id}','patientController@show');
    Route::get('patient/{id}/edit','patientController@edit');
 Route::patch('patient','patientController@update');






});
/*=====  End of AUTH PATIENT  ======*/

/*====================================
=            AUTH doctor            =
====================================*/


Route::group(['middleware' => ['auth','doctor'] ], function () {

    Route::patch('doctor/edit/{doctor}', 'DoctorController@edit');
    Route::get('doctor/create', 'DoctorController@create');


});
/*=====  End of AUTH doctor  ======*/

/*====================================
=            AUTH office            =
====================================*/


Route::group(['middleware' => ['auth','office'] ], function () {


});
/*=====  End of AUTH office  ======*/


/*==================================
=            auth ADMIN            =
==================================*/



/*=====  End of auth ADMIN  ======*/

Route::group(['middleware' => ['auth','admin'] ], function () {

 
    Route::resource('patient', 'PatientController');


    /*----------  especialidades  ----------*/


    route::get('speciality','SpecialityController@index');
    route::post('speciality/store','SpecialityController@store');
    route::post('speciality/update','SpecialityController@update');
    route::get('speciality/{id}','SpecialityController@show');

    route::delete('speciality/store','SpecialityController@destroy');


    /*----------  Facturas  ----------*/


    route::get('bills','BillController@index');

    /*----------  opciones  ----------*/



    route::get('options','optionController@index');
    route::post('options/user-default','optionController@userDefault');
    route::post('options/moneda','optionController@moneda');
    route::post('options/idioma','optionController@idioma');


    /*----------  char  ----------*/
    

 




    route::get('chat','chatController@index');

     

     

    

        


    
 
});



/*============================
=            AUTH            =
============================*/

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::patch('appointment/complete/{appointment}', 'AppointmentController@complete');
    Route::patch('appointment/rejected/{appointment}', 'AppointmentController@rejected');
    Route::patch('appointment/accepted/{appointment}', 'AppointmentController@accepted');
    Route::patch('appointment/cancelled/{appointment}', 'AppointmentController@cancelled');

    Route::patch('appointment/pending/{appointment}', 'AppointmentController@pending');
    Route::patch('appointment/late/{appointment}', 'AppointmentController@late');
    Route::patch('appointment/lost/{appointment}', 'AppointmentController@lost');


//api


    Route::post('api/appointment/gettime','API\\ApiController@AppointmentGetTime');

\  /*----------  comments  ----------*/
    

    Route::post('/appointment/comment/register','Appointment_commentController@register');
    Route::post('/appointment/comment/delete','Appointment_commentController@destroy');
});




/*=====  End of AUTH  ======*/



/*=============================
=            INDEX            =
=============================*/


//Página de inicio
Route::get('/', function () {
    return view('welcome');
});

/*=====  End of INDEX  ======*/




//Página para redireccionar a los que no son administradores
Route::get('/admin', function () {
    return view('admin');
});

//Rutas para autenticación de usuarios
Auth::routes();

