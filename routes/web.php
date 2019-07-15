<?php

Route::group(['namespace' => 'admin' , 'prefix' => 'admin'] , function (){

    Route::get('dashboard' , 'HomeController@index');
   
    // times Routes
    Route::get('times' , 'TimesController@index');
    Route::get('/add_times' , 'TimesController@create');
    Route::post('/add_times' , 'TimesController@store');
    Route::get('/edit_times/{id}' , 'TimesController@edit');
    Route::get('/show_times/{id}' , 'TimesController@show');
    Route::post('/update_times/{id}' , 'TimesController@update');
    Route::get('/delete_times/{id}' , 'TimesController@destroy');
   
    // doctors Routes
    Route::get('doctors' , 'DoctorsController@index');
    Route::get('/add_doctors' , 'DoctorsController@create');
    Route::post('/add_doctors' , 'DoctorsController@store');
    Route::get('/edit_doctors/{id}' , 'DoctorsController@edit');
    Route::get('/show_doctors/{id}' , 'DoctorsController@show');
    Route::post('/update_doctors/{id}' , 'DoctorsController@update');
    Route::get('/delete_doctors/{id}' , 'DoctorsController@destroy');
        
    // patients Routes
    Route::get('patients' , 'PatientsController@index');
    Route::get('/add_patients' , 'PatientsController@create');
    Route::post('/add_patients' , 'PatientsController@store');
    Route::get('/edit_patients/{id}' , 'PatientsController@edit');
    Route::get('/show_patients/{id}' , 'PatientsController@show');
    Route::post('/update_patients/{id}' , 'PatientsController@update');
    Route::get('/delete_patients/{id}' , 'PatientsController@destroy');

    // patient_documents Routes
    Route::get('patient_documents' , 'PatientDocumentsController@index');
    Route::get('/add_patient_documents' , 'PatientDocumentsController@create');
    Route::post('/add_patient_documents' , 'PatientDocumentsController@store');
    Route::get('/edit_patient_documents/{id}' , 'PatientDocumentsController@edit');
    Route::get('/show_patient_documents/{date}/{patient}/{doctor}' , 'PatientDocumentsController@show');
    Route::post('/update_patient_documents/{id}' , 'PatientDocumentsController@update');
    Route::get('/delete_patient_documents/{id}' , 'PatientDocumentsController@destroy');

    // departments Routes
    Route::get('departments' , 'DepartmentsController@index');
    Route::get('/add_departments' , 'DepartmentsController@create');
    Route::post('/add_departments' , 'DepartmentsController@store');
    Route::get('/edit_departments/{id}' , 'DepartmentsController@edit');
    Route::get('/show_departments/{id}' , 'DepartmentsController@show');
    Route::post('/update_departments/{id}' , 'DepartmentsController@update');
    Route::get('/delete_departments/{id}' , 'DepartmentsController@destroy');

    // doctor_appointments Routes
    Route::get('doctor_appointments' , 'DoctorAppointmentsController@index');
    Route::get('/add_doctor_appointments' , 'DoctorAppointmentsController@create');
    Route::post('/add_doctor_appointments' , 'DoctorAppointmentsController@store');
    Route::get('/edit_doctor_appointments/{id}' , 'DoctorAppointmentsController@edit');
    Route::get('/show_doctor_appointments/{id}' , 'DoctorAppointmentsController@show');
    Route::post('/update_doctor_appointments/{id}' , 'DoctorAppointmentsController@update');
    Route::get('/delete_doctor_appointments/{id}' , 'DoctorAppointmentsController@destroy');

    // reserve_appointment Routes
    Route::get('reserve_appointment' , 'ReserveAppointmentController@index');
    Route::get('/add_reserve_appointment' , 'ReserveAppointmentController@create');
    Route::post('/add_reserve_appointment' , 'ReserveAppointmentController@store');
    Route::get('/edit_reserve_appointment/{id}' , 'ReserveAppointmentController@edit');
    Route::get('/show_reserve_appointment/{id}' , 'ReserveAppointmentController@show');
    Route::post('/update_reserve_appointment/{id}' , 'ReserveAppointmentController@update');
    Route::get('/delete_reserve_appointment/{id}' , 'ReserveAppointmentController@destroy');
    Route::get('/get_doctor_appointments/{id}' , 'ReserveAppointmentController@get_doctor_appointments');

    // human_resources Routes
    Route::get('human_resources' , 'HumanResourcesController@index');
    Route::get('/add_human_resources' , 'HumanResourcesController@create');
    Route::post('/add_human_resources' , 'HumanResourcesController@store');
    Route::get('/edit_human_resources/{id}' , 'HumanResourcesController@edit');
    Route::get('/show_human_resources/{id}' , 'HumanResourcesController@show');
    Route::post('/update_human_resources/{id}' , 'HumanResourcesController@update');
    Route::get('/delete_human_resources/{id}' , 'HumanResourcesController@destroy');

    // xxx Routes
    Route::get('xxx' , 'BrancheController@index');
    Route::get('/add_xxx' , 'BrancheController@create');
    Route::post('/add_xxx' , 'BrancheController@store');
    Route::get('/edit_xxx/{id}' , 'BrancheController@edit');
    Route::get('/show_xxx/{id}' , 'BrancheController@show');
    Route::post('/update_xxx/{id}' , 'BrancheController@update');
    Route::get('/delete_xxx/{id}' , 'BrancheController@destroy');

    // settings Routes
    Route::get('settings' , 'SettingsController@index');
    Route::get('/add_settings' , 'SettingsController@create');
    Route::post('/add_settings' , 'SettingsController@store');
    Route::get('/edit_settings/{id}' , 'SettingsController@edit');
    Route::get('/show_settings/{id}' , 'SettingsController@show');
    Route::post('/update_settings/{id}' , 'SettingsController@update');
    Route::get('/delete_settings/{id}' , 'SettingsController@destroy');

    // Reports
    Route::get('/reports' , 'Reports@index');
    Route::post('/show_students_report/{from}/{to}/{education_year}/{matter}/{gender}' , 'Reports@show_students_report');
    Route::get('/students_reports' , function(){
        return view("admin/students_reports/index");
    });
        

});


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('local/{lang}', 'HomeController@index')->name('home');

// Route::get('locale/{lang}', function ($locale) {

//     session()->put('locale' , $locale);

//     return redirect()->back();
// });
