<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

Route::match(['get', 'post'], 'invoice/listing', 'InvoiceController@listing')->name('invoice_listing');
Route::get('invoice/delete/{id}', 'InvoiceController@delete')->name('invoice_delete');
Route::get('invoice/edit/{id}', 'InvoiceController@edit')->name('invoice_edit');
Route::get('invoice/create', 'InvoiceController@create')->name('invoice_create');
//<== @Hou
Route::get('product/list',[ProductController::class,'list'])->name('product_list');
Route::get('product/delete/{id}',[ProductController::class,'delete']);
Route::match(['get', 'post'], 'product/edit/{id}', [ProductController::class,'edit'])->name('product_edit');
Route::match(['get', 'post'], 'product/add', [ProductController::class,'add'])->name('product_add');
<<<<<<< Updated upstream
=======

Route::match(['get', 'post'], 'product/filter', 'ProductController@filter')->name('product_filter');
Route::match(['get', 'post'], 'product/detail/{id}', 'ProductController@detail')->name('product_detail');
Route::get('product/reset_filter',function(){
    if(session()->has('product_search')){
        session()->forget('product_search');
    };
    return redirect(route('product_filter'));
});
>>>>>>> Stashed changes
// ==>

//<== @User,Employee TestController
Route::get('/user', function(){
    return view('testuser');
});
Route::post('/get', [UserController::class, 'getUser']);
Route::post('/user/add', [UserController::class, 'addUser']);
Route::post('/update', [UserController::class, 'updateUser']);
Route::post('/delete', [UserController::class, 'deleteUser']);
// ==>

Route::get('/company/admin', [UserController::class, 'getUsers']);
Route::match(['get', 'post'], '/user/add/{type}', [UserController::class, 'addUser']);
Route::match(['get', 'post'], '/user/edit/{type}/{id}', [UserController::class, 'editUser']);
Route::match(['get', 'post'], '/user/delete/{id}', [UserController::class, 'deleteUser']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//<== @OrderController
Route::get('/order', [OrderController::class, 'listOrder']);
Route::get('/addorder', function() {
    return view('layouts/addorder');
});
Route::post('/addorder', [OrderController::class, 'addOrder']);
Route::get('/deleteorder/{id}', [OrderController::class, 'deleteOrder']);
Route::get('/updateorder/{id}', [OrderController::class, 'updateOrderPage']);
Route::post('/updateorder/{id}', [OrderController::class, 'modifyOrder']);
// ==>

Route::match(['get', 'post'], 'product/listing', 'ProductController@listing')->name('product_listing');

require __DIR__.'/auth.php';