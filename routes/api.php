<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UploadImageController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//YY
Route::get("getallinvoice", [InvoiceController::class, "retrieveInvoice"]);
Route::get("getallorder/{id}", [InvoiceController::class, "retrieveOrder"]);
Route::get("getinvoice/{id}", [InvoiceController::class, "retrieveSpecificInvoice"]);

// Rickie
Route::get('/useraccount', [UserController::class, 'index']);
Route::post('/useraccount/create', [UserController::class, 'create']);
Route::delete('/useraccount/delete/{id}', [UserController::class, 'delete']);
Route::put('/useraccount/update/{id}', [UserController::class, 'update']);
//Hao
Route::get('/inventory', [App\Http\Controllers\InventoryController::class, 'index']);
Route::post('/inventory/create', [App\Http\Controllers\InventoryController::class, 'create']);
Route::put('/inventory/update/{id}', [App\Http\Controllers\InventoryController::class, 'update']);
Route::delete('/inventory/delete/{id}', [App\Http\Controllers\InventoryController::class, 'delete']);

Route::post('/upload',[App\Http\Controllers\UploadImageController::class, 'store']);

Route::get('/adminaccount', [AdminController::class, 'index']);
Route::post('/adminaccount/create', [AdminController::class, 'create']);
Route::delete('/adminaccount/delete/{id}', [AdminController::class, 'delete']);
Route::put('/adminaccount/update/{id}', [AdminController::class, 'update']);

Route::get('/employeeaccount', [EmployeeController::class, 'index']);
Route::post('/employeeaccount/create', [EmployeeController::class, 'create']);
Route::delete('/employeeaccount/delete/{id}', [EmployeeController::class, 'delete']);
Route::put('/employeeaccount/update/{id}', [EmployeeController::class, 'update']);