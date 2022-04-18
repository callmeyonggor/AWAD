<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth:admin',
], function(){
    Route::view('/product','/contents/product/list');
});
