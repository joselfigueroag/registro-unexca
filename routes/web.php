<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PatientController;

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

Route::get('/patients/create', [PatientController::class, 'create'])->name('register_patient');
Route::post('/patients', [PatientController::class, 'store']);
Route::get('/patients', [PatientController::class, 'index'])->name('list_patients');
Route::get('/patients/{identification_number}', [PatientController::class, 'show'])->name('show_patient');