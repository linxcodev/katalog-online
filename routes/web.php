<?php

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

Route::get('/', 'HomeController@index');

Route::prefix('supplier')->group(function () {
  Route::get('/', 'SupplierController@index')->name('supplier.index');
  Route::post('/', 'SupplierController@store')->name('supplier.store');
  Route::put('/', 'SupplierController@update')->name('supplier.update');
  Route::delete('/delete', 'SupplierController@destroy')->name('supplier.destroy');
});

Route::prefix('produk')->group(function () {
  Route::get('/', 'ProdukController@index')->name('produk.index');
  Route::post('/', 'ProdukController@store')->name('produk.store');
  Route::put('/', 'ProdukController@update')->name('produk.update');
  Route::delete('/delete', 'ProdukController@destroy')->name('produk.destroy');
});
