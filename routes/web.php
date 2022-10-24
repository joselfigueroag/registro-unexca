<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicalServiceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PatientController;
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

Route::get('/users', [UserController::class, 'index'])->name('list_users');
Route::get('/users/{id}', [UserController::class, 'show'])->name('show_user');
Route::get('/users/{id}/delete', [UserController::class, 'destroy'])->name('delete_user');

Route::get('/patients/create', [PatientController::class, 'create'])->name('register_patient');
Route::post('/patients', [PatientController::class, 'store']);
Route::get('/patients', [PatientController::class, 'index'])->name('list_patients');
Route::get('/patients/{id}', [PatientController::class, 'show'])->name('show_patient');
Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('edit_patient');
Route::put('/patients/{id}/edit', [PatientController::class, 'update'])->name('update_patient');
Route::get('/patients/{id}/delete', [PatientController::class, 'destroy'])->name('delete_patient');

Route::post('/departments', [DepartmentController::class, 'store'])->name('add_department');
Route::get('/departments', [DepartmentController::class, 'index'])->name('list_departments');
Route::get('/departments/{id}/delete', [DepartmentController::class, 'destroy'])->name('delete_department');

Route::post('/clinical_services', [ClinicalServiceController::class, 'store'])->name('add_clinical_service');
Route::get('/clinical_services', [ClinicalServiceController::class, 'index'])->name('list_clinical_services');
Route::get('/clinical_services/{id}/delete', [ClinicalServiceController::class, 'destroy'])->name('delete_clinical_service');

Route::get('/appointments', [AppointmentController::class, 'index'])->name('list_appointments');
Route::post('/appointments/register/patient/{id}', [AppointmentController::class, 'store'])->name('register_appointment');