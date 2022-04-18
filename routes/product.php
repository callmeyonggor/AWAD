<?php
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], 'product/filter', 'ProductController@filter')->name('product_filter');
Route::get('product/reset_filter',function(){
    if(session()->has('product_search')){
        session()->forget('product_search');
    };
    return redirect(route('product_filter'));
});
Route::match(['get', 'post'], 'product/detail/{id}', 'ProductController@detail')->name('product_detail');
Route::match(['get', 'post'], 'product/order', 'ProductController@order')->name('product_order');
Route::match(['get', 'post'], 'product/submit_order', 'ProductController@submit_order')->name('submit_order');
Route::match(['get', 'post'], 'product/delete_order', 'ProductController@delete_order')->name('delete_order');

?>