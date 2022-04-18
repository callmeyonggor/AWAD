<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('Auth/Login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';
require __DIR__.'/product.php';
require __DIR__.'/invoice.php';
require __DIR__.'/inventory.php';
require __DIR__.'/account.php';