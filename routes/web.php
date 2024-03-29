<?php
 
use App\User;

/*===========================
=            WEB            =
===========================*/



Auth::routes(['verify'=>true]);


Route::get('usuarios','WebController@usuarios');
Route::get('test/','WebController@test');
Route::get('chart','WebController@chart');

Route::get('/visitante/citas','WebController@citas');
Route::get('/visitante/especialidades','WebController@especialidades');

Route::get('/visitante/especialidad/{id}','WebController@especialidad');

Route::get('/visitante/consultorios','WebController@consultorios');
Route::get('/visitante/consultorio/{id}','WebController@consultorio');
Route::get('/visitante/mapa/{id}','WebController@mapa');

Route::get('/visitante/doctor/{id}','WebController@doctor');
Route::get('/visitante/doctores/','WebController@doctores');
Route::get('/visitante/','WebController@visitante');


Route::get('acerca','WebController@acerca');
Route::get('contacto','WebController@contacto');


Route::post('/contacto','WebController@contactus')->name('contact.us');

/*=====  End of WEB  ======*/




Route::group(['middleware' => ['auth','admin'] ], function () {
    route::get('admin/create','AdminController@create')->name('admin.create');
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
  
    Route::post('appointment/create/{doctor}','AppointmentController@createWithDoctor');


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
    // route::post('chat/count/','chatController@count');
    // route::post('chat/total/','chatController@total');




    // admin


    route::get('admin/{admin}','AdminController@show')->name('admin.show');


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


//    Route::get('office/{id}/edit','OfficeController@edit');
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


    route::get('admin/{admin}/edit','AdminController@edit')->name('admin.edit');
    route::post('admin','AdminController@store')->name('admin.store');
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


   Route::get('wizard','HomeController@wizard')->name('wizard');


   Route::get('patient/{id}','patientController@show');
   Route::get('patient/{id}/edit','patientController@edit');
   Route::put('patient/{patient}','PatientController@update')->name('patient.update');


   Route::get('office/{id}' ,'OfficeController@show')->name('office.show');
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



    Route::get('office/{id}/edit','OfficeController@edit');

     Route::put('office/{office}', 'OfficeController@update')->name('office.update');
     Route::put('office/{office}/login', 'OfficeController@updateLogin')->name('office.update.login');
     Route::put('office/{office}/image', 'OfficeController@updateImage')->name('office.update.image');
    
 


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

