<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;

//YY
Route::group(['middleware' => 'auth:admin'], function() {
    Route::get("/admin/invoicelist", [InvoiceController::class, "listInvoice"]);
});

Route::get("/invoicelist", [InvoiceController::class, "view"]);
Route::get('/order', [OrderController::class, 'listOrder']);
Route::get('/order/{InvoiceID}', [OrderController::class, 'view']);