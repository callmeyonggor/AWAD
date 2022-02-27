<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemDetailsController;
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
Route::get('list',[ItemDetailsController::class,'list']);
Route::get('delete/{id}',[ItemDetailsController::class,'delete']);
Route::get('edit/{id}',[ItemDetailsController::class,'edit']);
Route::post('edit',[ItemDetailsController::class,'update']);
Route::view('add','add');
Route::post('add',[ItemDetailsController::class,'addItem']);
// ==>

//<== @rickie's
Route::get('/user', function(){
    return view('testuser');
});
Route::post('/get', [UserController::class, 'getUser']);
Route::post('/add', [UserController::class, 'addUser']);
Route::post('/update', [UserController::class, 'updateUser']);
Route::post('/delete', [UserController::class, 'deleteUser']);
// ==>

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
