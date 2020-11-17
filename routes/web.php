<?php

use App\Notifications\Prueba;
use App\User;

/*===========================
=            WEB            =
===========================*/



Auth::routes(['verify'=>true]);


Route::get('/visitante/citas','webController@citas');
Route::get('/visitante/especialidades','webController@especialidades');

Route::get('/visitante/especialidad/{id}','webController@especialidad');

Route::get('/visitante/consultorios','webController@consultorios');
Route::get('/visitante/consultorio/{id}','webController@consultorio');
Route::get('/visitante/mapa/{id}','webController@mapa');

Route::get('/visitante/doctor/{id}','webController@doctor');
Route::get('/visitante/doctores/','webController@doctores');
Route::get('/visitante/','webController@visitante');


Route::get('acerca','webController@acerca');
Route::get('contacto','webController@contacto');


Route::post('/contacto','webController@contactus')->name('contact.us');

/*=====  End of WEB  ======*/


/*===========================
=            API            =
===========================*/


Route::post('/visitante/search-especialidades','API\\ApiController@searchespecialidades');
Route::post('/visitante/search-doctores/especialidad','API\\ApiController@searchDoctorEspecialidad');
Route::post('/visitante/search-doctores','API\\ApiController@searchDoctores')->name('api.search.doctors');
Route::get('/get/officesdoctors/{id}','API\\ApiController@get_officesDoctors');


//calendario
Route::post('/get/appointment','API\\ApiController@getAppointment');
Route::post('/get/appointments/patient','API\\ApiController@getAppointmentPatient');
Route::post('/get/appointments/doctor','API\\ApiController@getAppointmentDoctor');


/*=====  End of API  ======*/



Route::group(['middleware' => ['auth','admin'] ], function () {
    route::get('admin/create','adminController@create')->name('admin.create');
});


/*====================================
=            AUTH PATIENT            =
====================================*/


Route::group(['middleware' => ['auth','patient'] ], function () {

    Route::get('payment','PaymentController@index')->name('payment.index');
    Route::get('payment/create','PaymentController@create')->name('payment.create');
    Route::get('payment/billingPortal','PaymentController@billingPortal')->name('billingPortal');
    Route::post('payment','PaymentController@store')->name('payment.store');
    Route::post('payment/other','PaymentController@other')->name('payment.store.other');
    Route::get('invoice/download/{payment}','InvoiceController@download')->name('invoice.download');
 
     Route::post('pay/{appointment}/online','PaymentController@online')->name('payment.store.online');
    Route::post('pay/{appointment}/invoice','PaymentController@invoice')->name('payment.store.invoice');


    Route::post('pay/{appointment}/then','PaymentController@then')->name('payment.then');
    Route::get('payment/{appointment}/doctor','PaymentController@doctor')->name('payment.doctor');
 
    Route::get('payment/{appointment}/user','PaymentController@user')->name('payment.user');
    //

    Route::get('chatbot','ChatController@bot')->name('chatbot');
    Route::resource('appointment', 'AppointmentController');          
  


    Route::get('appointment/create/{id_doctor}/{id_speciality}','AppointmentController@create');

    Route::get('appointment/create','AppointmentController@create');
    Route::get('doctor', 'DoctorController@index');
    Route::get('office', 'OfficeController@index');
    

    Route::get('speciality','SpecialityController@index');

    Route::get('prescription/download/{id}', 'PrescriptionController@download');

///


    Route::get('notifications/','NotificationController@index')->name('notifications.index');




    //review

    Route::put('review/{appointment}', 'ReviewController@store')->name('review.store');


});
/*=====  End of AUTH PATIENT  ======*/

/*====================================
=            AUTH doctor            =
====================================*/


Route::group(['middleware' => ['auth','doctor'] ], function () {

    Route::get('patient','PatientController@index');

    Route::patch('doctor/edit/{doctor}', 'DoctorController@edit');

    Route::get('doctor/{id}/edit', 'DoctorController@edit');
    Route::post('prescription/store','PrescriptionController@store');
    Route::post('prescription/update','PrescriptionController@update');
    Route::get('prescription','PrescriptionController@index');
    Route::get('prescription/download/{id}', 'PrescriptionController@download');



    /*----------  char  ----------*/
    




route::get('profile/image/{id}','ProfileController@image')->name('profile.image');
    

    route::get('chat','chatController@index');
    route::post('chat/count/','chatController@count');
    route::post('chat/total/','chatController@total');




    // admin


    route::get('admin/{admin}','adminController@show')->name('admin.show');


});
/*=====  End of AUTH doctor  ======*/

/*====================================
=            AUTH office            =
====================================*/


Route::group(['middleware' => ['auth','office'] ], function () {


route::put('profile/regenerate/{user}','ProfileController@regenerate')->name('profile.regenerate');


    Route::delete('patient/{patient}/destroy','PatientController@destroy');
    Route::get('patient/create','PatientController@create');
    Route::post('patient/store','PatientController@store')->name('patient.store');
    Route::delete('doctor/destroy/{doctor}', 'DoctorController@destroy');


//    Route::get('office/{id}/edit','officeController@edit');
    Route::patch('office','OfficeController@update');


    Route::get('doctor/create', 'DoctorController@create')->name('doctor.create');
    Route::post('doctor/store', 'DoctorController@store')->name('doctor.store');


    /*----------  especialidades  ----------*/


    route::post('speciality/store','SpecialityController@store');
    route::post('speciality/update','SpecialityController@update');

    route::delete('speciality/store','SpecialityController@destroy');
    /*----------  users  ----------*/

    route::get('user','UserController@index');



});
/*=====  End of AUTH office  ======*/


/*==================================
=            auth ADMIN            =
==================================*/



/*=====  End of auth ADMIN  ======*/

Route::group(['middleware' => ['auth','admin'] ], function () {





    /*----------  Facturas  ----------*/


    route::get('bills','BillController@index');

    /*----------  opciones  ----------*/



    route::get('options','optionController@index');
    route::post('options/user-default','optionController@userDefault');
    route::post('options/moneda','optionController@moneda');
    route::post('options/idioma','optionController@idioma');




    /*----------  Office  ----------*/

    route::get('office/create','OfficeController@create');
    route::post('office/store','OfficeController@store')->name('office.store');
    route::delete('office/{office}/delete','OfficeController@destroy');


    


// admin


    route::get('admin/{admin}/edit','adminController@edit')->name('admin.edit');
    route::post('admin','adminController@store')->name('admin.store');
    route::put('admin/{admin}','AdminController@update')->name('admin.update');
     Route::put('admin/{admin}/login', 'AdminController@updateLogin')->name('admin.update.login');
     Route::put('admin/{admin}/image', 'AdminController@updateImage')->name('admin.update.image');
     
    // user

     Route::put('user/{user}/block', 'UserController@block')->name('user.block');

});



/*============================
=            AUTH            =
============================*/


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::patch('appointment/attend/{appointment}', 'AppointmentController@attend');
    Route::patch('appointment/rejected/{appointment}', 'AppointmentController@rejected');
    Route::patch('appointment/accepted/{appointment}', 'AppointmentController@accepted');
    Route::patch('appointment/cancelled/{appointment}', 'AppointmentController@cancelled');

    Route::patch('appointment/pending/{appointment}', 'AppointmentController@pending');
    Route::patch('appointment/late/{appointment}', 'AppointmentController@late');
    Route::patch('appointment/lost/{appointment}', 'AppointmentController@lost');


    ///////////////////// prscriptions

    Route::get('prescription','PrescriptionController@index');




//api


    Route::post('api/appointment/gettime','API\\ApiController@AppointmentGetTime');

    /*----------  comments  ----------*/
    
    Route::post('/appointment/comment/register','Appointment_commentController@register');
    Route::post('/appointment/comment/delete','Appointment_commentController@destroy');
    Route::post('/appointment/comment/update','Appointment_commentController@update');


});




/*=====  End of AUTH  ======*/
///////////////////////////////////////////////////////////////////////////////////////////////////   


Route::group(['middleware' => ['auth','patient'] ], function () {

   Route::get('like','LikeController@index')->name('like.index');



   Route::get('patient/{id}','patientController@show');
   Route::get('patient/{id}/edit','patientController@edit');
   Route::put('patient/{patient}','PatientController@update')->name('patient.update');


   Route::get('office/{id}' ,'officeController@show')->name('office.show');
   Route::get('doctor/{id}','DoctorController@show')->name('doctor.show');


   route::get('speciality/{id}','SpecialityController@show');



   Route::put('profile/{user}/login','ProfileController@updateLogin')->name('profile.update.login');
   Route::put('profile/{user}/image','ProfileController@updateImage')->name('profile.update.image');


});

Route::group(['middleware' => ['auth','doctor'] ], function () {

     Route::put('doctor/{doctor}', 'DoctorController@update')->name('doctor.update');
     Route::put('doctor/{id}/login', 'DoctorController@updateLogin')->name('doctor.update.login');
     Route::put('doctor/{id}/image', 'DoctorController@updateImage')->name('doctor.update.image');
     

});


Route::group(['middleware' => ['auth','office'] ], function () {



    Route::get('office/{id}/edit','officeController@edit');

     Route::put('office/{office}', 'officeController@update')->name('office.update');
     Route::put('office/{office}/login', 'officeController@updateLogin')->name('office.update.login');
     Route::put('office/{office}/image', 'officeController@updateImage')->name('office.update.image');
    
 


});



////////////////////////////////////////////////////////////


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

