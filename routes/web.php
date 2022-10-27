<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicalServiceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(UserController::class)->middleware('auth')->group(function(){
Route::get('/users','index')->name('list_users');
Route::get('/users/{id}','show')->name('show_user');
Route::get('/users/{id}/delete','destroy')->name('delete_user');
});

Route::controller(PatientController::class)->middleware('auth')->group(function(){
Route::get('/patients/create','create')->name('register_patient');
Route::post('/patients','store');
Route::get('/patients','index')->name('list_patients');
Route::get('/patients/{id}','show')->name('show_patient');
Route::get('/patients/{id}/edit','edit')->name('edit_patient');
Route::put('/patients/{id}/edit','update')->name('update_patient');
Route::get('/patients/{id}/delete','destroy')->name('delete_patient');
});

Route::controller(DepartmentController::class)->middleware('auth')->group(function(){
Route::post('/departments','store')->name('add_department');
Route::get('/departments','index')->name('list_departments');
Route::get('/departments/{id}/delete','destroy')->name('delete_department');
});

Route::controller(ClinicalServiceController::class)->middleware('auth')->group(function(){
Route::post('/clinical_services','store')->name('add_clinical_service');
Route::get('/clinical_services','index')->name('list_clinical_services');
Route::get('/clinical_services/{id}/delete','destroy')->name('delete_clinical_service');
});

Route::controller(AppointmentController::class)->middleware('auth')->group(function(){
Route::get('/appointments','index')->name('list_appointments');
Route::post('/appointments/register/patient/{id}','store')->name('register_appointment');
});

Route::controller(SpecialistController::class)->middleware('auth')->group(function(){
   Route::get('/specialists','index')->name('specialist_index');
   Route::get('/specialists/create','create')->name('register_specialists');
   Route::post('/specialists/create','store')->name('register_specialists');
});