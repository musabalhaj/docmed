<?php

Route::get('/', function () {
    return view('index');
});

Route::get('Appointment/Make', 'frontendController@MakeAppointment')->name('MakeAppointment');
Route::post('Make/Appointment/Store', 'frontendController@MakeAppointmentStore')->name('MakeAppointmentStore');
Route::get('lang/{locale}', 'frontendController@lang');
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('Appointment/AppointmentTest/{id}','AppointmentController@AppointmentTest')->name('AppointmentTest');
    Route::post('Appointment/AppointmentStoreTest','AppointmentController@AppointmentStoreTest')->name('AppointmentStoreTest');
    Route::get('Appointment/TestResult/{id}','AppointmentController@TestResult')->name('TestResult');
    Route::post('Appointment/AppointmentStoreTestResult','AppointmentController@AppointmentStoreTestResult')->name('AppointmentStoreTestResult');
    Route::get('Appointment/AppointmentDiagnos/{id}','AppointmentController@AppointmentDiagnos')->name('AppointmentDiagnos');
    Route::post('Appointment/AppointmentStoreDiagnos','AppointmentController@AppointmentStoreDiagnos')->name('AppointmentStoreDiagnos');
    Route::get('Appointment/AppointmentTretment/{id}', 'AppointmentController@AppointmentTretment')->name('AppointmentTretment');

    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::get('/setting', 'SettingController@index')->name('setting');
    Route::resource('ServiceInfo', 'ServiceInfoController');
    
    Route::get('/ExpenseReport', 'ReportController@ExpenseReport')->name('ExpenseReport');
    Route::get('/AppointmentReport', 'ReportController@AppointmentReport')->name('AppointmentReport');
    Route::get('/IncomeReport', 'ReportController@IncomeReport')->name('IncomeReport');
    Route::get('/PatientReport', 'ReportController@PatientReport')->name('PatientReport');
    Route::get('/PatientTestReport', 'ReportController@PatientTestReport')->name('PatientTestReport');
    Route::get('/UserReport', 'ReportController@UserReport')->name('UserReport');
    Route::get('/IncomeExpenseReport', 'ReportController@IncomeExpenseReport')->name('IncomeExpenseReport');
});

Route::group(['middleware' => ['auth' ,'admin'] ], function () {
    Route::resource('Gender', 'GenderController');
    Route::resource('BloodSymbol', 'BloodSymbolController');
    Route::resource('MaritalStatus', 'MaritalStatusController');
    Route::resource('Department', 'DepartmentController');
    Route::get('Department/{id}/ActiveDepartment','DepartmentController@ActiveDepartment')->name('ActiveDepartment');
    Route::get('Department/{id}/InActiveDepartment','DepartmentController@InActiveDepartment')->name('InActiveDepartment');
    Route::resource('Jop', 'JopController');
    Route::get('Jop/{id}/ActiveJop','JopController@ActiveJop')->name('ActiveJop');
    Route::get('Jop/{id}/InActiveJop','JopController@InActiveJop')->name('InActiveJop');
    Route::resource('Employee', 'EmployeeController');
    Route::resource('Doctor', 'DoctorController');
    Route::resource('Reception', 'ReceptionController');
    Route::resource('Laboratory', 'LaboratoryController');
    Route::resource('Pharmacy', 'PharmacyController');
    Route::resource('Accounting', 'AccountingController');
    Route::resource('Category', 'CategoryController');
    Route::resource('Item', 'ItemController');
    Route::resource('PaymentMethod', 'PaymentMethodController');
    Route::get('PaymentMethod/{id}/ActivePaymentMethod','PaymentMethodController@ActivePaymentMethod')->name('ActivePaymentMethod');
    Route::get('PaymentMethod/{id}/InActivePaymentMethod','PaymentMethodController@InActivePaymentMethod')->name('InActivePaymentMethod');
    Route::resource('Bank', 'BankController');
    Route::resource('Branch', 'BranchController');
    Route::resource('Account', 'AccountController');
});

Route::group(['middleware' => ['auth','reception']], function () {
    Route::resource('Service', 'ServiceController');
    Route::get('Service/{id}/ActiveService','ServiceController@ActiveService')->name('ActiveService');
    Route::get('Service/{id}/InActiveService','ServiceController@InActiveService')->name('InActiveService');
    Route::resource('Schedule', 'ScheduleController');
    Route::get('Schedule/{id}/ActiveSchedule','ScheduleController@ActiveSchedule')->name('ActiveSchedule');
    Route::get('Schedule/{id}/InActiveSchedule','ScheduleController@InActiveSchedule')->name('InActiveSchedule');
    Route::resource('Appointment', 'AppointmentController');
    Route::get('Appointment/{id}/ActiveAppointment','AppointmentController@ActiveAppointment')->name('ActiveAppointment');
    Route::get('/createService','AppointmentController@createService')->name('createService');
    // Route::get('/createTest','AppointmentController@createTest')->name('createTest');
});

Route::group(['middleware' => ['auth','accounting']], function () {
    Route::resource('Salary', 'SalaryController');
    Route::resource('Cat', 'CatController');
    Route::resource('Supplier', 'SupplierController');
    Route::get('Supplier/{id}/ActiveSupplier','SupplierController@ActiveSupplier')->name('ActiveSupplier');
    Route::get('Supplier/{id}/InActiveSupplier','SupplierController@InActiveSupplier')->name('InActiveSupplier');
    Route::resource('Expense', 'ExpenseController');
    Route::resource('Bill', 'BillController');
    Route::resource('Income', 'IncomeController');
    Route::resource('Customer', 'CustomerController');
    Route::get('PatientBill/{id}', 'CustomerController@PatientBill')->name('PatientBill');
});
Route::group(['middleware' => ['auth','laboratorist']], function () {
    Route::resource('Test', 'TestController');
    Route::get('Test/{id}/ActiveTest','TestController@ActiveTest')->name('ActiveTest');
    Route::get('Test/{id}/InActiveTest','TestController@InActiveTest')->name('InActiveTest');
});
