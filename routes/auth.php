<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/employee', [LoginController::class,'showEmployeeLoginForm']);
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::get('/register/employee', [RegisterController::class,'showEmployeeRegisterForm']);
Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/login/employee', [LoginController::class,'employeeLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);
Route::post('/register/employee', [RegisterController::class,'createEmployee']);
Route::group(['middleware' => 'auth:employee'], function () {
    Route::view('/employee', 'employee');
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});
Route::get('logout', [LoginController::class,'logout']);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');