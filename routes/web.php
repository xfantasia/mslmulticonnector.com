<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WebHRPayrollConfigController;
use App\Http\Controllers\SAPFinancialSystemsController;
use App\Http\Controllers\SAPFinancialServicesController;
use App\Http\Controllers\SAPCommunicationArrangementsController;
use App\Http\Controllers\SAPCommunicationComponentsController;
use App\Http\Controllers\SAPJournalEntryConfigController;


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

//TEST ROUTE
Route::get('/test', function () {
    return view('pages/test');
});


//LOGIN ROUTE (Custom)
Route::get('/login', function () {
    return view('pages/login');
});


//REGISTER ROUTE (Custom)
Route::get('/register', function () {
    return view('pages/register');
});


//USE DEFUALT LOGIN/REGISTER AUTH ROUTES (Overide custom routes)
Auth::routes();


//HOME & DASHBOARD CONTROLLER
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


//WEB-HR CONTROLLER
Route::resource('webhr_payroll_config', WebHRPayrollConfigController::class);
Route::post('/webhr_payroll_config_test', [App\Http\Controllers\WebHRPayrollConfigController::class, 'payroll_config_test'])->name('webhr_payroll_config_test');

Route::get('/webhr_payrollc', [App\Http\Controllers\WebHRPayrollConfigController::class, 'payroll_config_test'])->name('webhr_payroll_config_test2');


//SAP CONTROLLER
Route::resource('sap_financial_systems', SAPFinancialSystemsController::class);
Route::resource('sap_financial_services', SAPFinancialServicesController::class);
Route::resource('sap_communication_arrangements', SAPCommunicationArrangementsController::class);
Route::resource('sap_communication_components', SAPCommunicationComponentsController::class);
Route::resource('sap_journal_entry_config', SAPJournalEntryConfigController::class);


//ARTISAN CONTROLLER
Route::get('/artisan/migrate/12345', [App\Http\Controllers\ArtisanCommandController::class, 'xmigrate'])->name('xmigrate');


//LOGOUT CONTROLLER
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


//TEST CONTROLLER
Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');
Route::get('/test1', [App\Http\Controllers\TestController::class, 'test1'])->name('test1');
Route::get('/test2', [App\Http\Controllers\TestController::class, 'test2'])->name('test2');
Route::get('/test3', [App\Http\Controllers\TestController::class, 'test3'])->name('test3');
Route::get('/test4', [App\Http\Controllers\TestController::class, 'test4'])->name('test4');
Route::get('/test5', [App\Http\Controllers\TestController::class, 'test5'])->name('test5');
