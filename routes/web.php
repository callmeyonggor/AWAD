<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemDetailsController;
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

Route::get('list',[ItemDetailsController::class,'list']);

Route::get('delete/{id}',[ItemDetailsController::class,'delete']);

Route::get('edit/{id}',[ItemDetailsController::class,'edit']);

Route::post('edit',[ItemDetailsController::class,'update']);

Route::view('add','add');

Route::post('add',[ItemDetailsController::class,'addItem']);