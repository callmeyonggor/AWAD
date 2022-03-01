<?php

use Illuminate\Support\Facades\Route;
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
Route::get('product/list',[ProductController::class,'list']);
Route::get('product/delete/{id}',[ProductController::class,'delete']);
Route::get('product/edit/{id}',[ProductController::class,'edit']);
Route::post('product/edit',[ProductController::class,'update']);
Route::view('product/add','add');
Route::post('product/add',[ProductController::class,'addItem']);
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




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::match(['get', 'post'], 'product/listing', 'ProductController@listing')->name('product_listing');
