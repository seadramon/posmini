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
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {

	Route::get('/',			['uses' => 'DashboardController@index', 'as' => 'dashboard']);

	Route::group(['prefix' => 'master', 'as' => 'master.'], function() {

		Route::get('kategori',	['uses' => 'KategoriController@index', 'as' => 'kategori-index']);
		Route::get('kategori-entri/{id?}',	['uses' => 'KategoriController@entri', 'as' => 'kategori-entri']);
		Route::get('kategori-delete/{id?}',	['uses' => 'KategoriController@delete', 'as' => 'kategori-delete']);
		Route::post('kategori-simpan',	['uses' => 'KategoriController@store', 'as' => 'kategori-simpan']);
	});

	Route::group(['prefix' => 'produk', 'as' => 'produk.'], function() {

		Route::get('/',				['uses' => 'ProdukController@index', 'as' => 'index']);
		Route::get('entri/{id?}',	['uses' => 'ProdukController@entri', 'as' => 'entri']);
		Route::get('delete/{id?}',	['uses' => 'ProdukController@delete', 'as' => 'delete']);
		Route::post('simpan',		['uses' => 'ProdukController@store', 'as' => 'simpan']);
	});
});
