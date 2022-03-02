<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/order', [OrderController::class, 'listOrder']);

Route::get('/addorder', function() {
    return view('layouts/addorder');
});

Route::post('/addorder', [OrderController::class, 'addOrder']);

Route::get('/deleteorder/{id}', [OrderController::class, 'deleteOrder']);

Route::get('/updateorder/{id}', [OrderController::class, 'updateOrderPage']);

Route::post('/updateorder/{id}', [OrderController::class, 'modifyOrder']);

require __DIR__.'/auth.php';