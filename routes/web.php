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

Route::get('/', 'UserController@login');
// Route::get('/', function(){ 
//     echo Hash::make('admin123');
// });
Route::post('post-login', 'UserController@postlogin');
// Auth::routes();

Route::group(['middleware' => ['session']], function () {

    Route::get('logout', 'UserController@logout');

    //Dashboard
    Route::get('home', 'DashboardController@home');

    //PELANGGAN
    Route::get('pelanggan', 'PelanggansController@index');
    Route::get('pelanggan/tambah-pelanggan', 'PelanggansController@tambah_pelanggan');
    Route::post('post-pelanggan', 'PelanggansController@post_pelanggan');
    Route::get('edit/pelanggan/{id}', 'PelanggansController@edit_pelanggan');
    Route::post('editpost/pelanggan/{id}', 'PelanggansController@editpost_pelanggan');
    Route::get('hapus/pelanggan/{id}', 'PelanggansController@hapus_pelanggan');

    //RREFERENSI
    Route::get('jasa', 'ReferensisController@index_jasa');
    Route::get('jasa/tambah-jasa', 'ReferensisController@tambah_jasa');
    Route::post('post-jasa', 'ReferensisController@post_jasa');
    Route::get('jasa/{id}/edit', 'ReferensisController@edit_jasa');
    Route::post('jasa/{id}/editpost', 'ReferensisController@editpost_jasa');
    Route::get('jasa/{id}/hapus', 'ReferensisController@hapus_jasa');

    Route::get('sparepart', 'ReferensisController@index_sparepart');
    Route::get('sparepart/tambah-sparepart', 'ReferensisController@tambah_sparepart');
    Route::post('post-sparepart', 'ReferensisController@post_sparepart');
    Route::get('sparepart/{id}/edit', 'ReferensisController@edit_sparepart');
    Route::post('sparepart/{id}/editpost', 'ReferensisController@editpost_sparepart');
    Route::get('sparepart/{id}/hapus', 'ReferensisController@hapus_sparepart');

    //WORKORDER
    Route::get('work-data', 'WorkordersController@index');
    Route::get('buat-order', 'WorkordersController@buat_order');
    Route::post('post-order', 'WorkordersController@post_order');
    Route::get('work-order/{id}', 'WorkordersController@show_order');
    Route::get('Work-order/{id}/edit', 'WorkordersController@edit_order');
    Route::post('Work-order/{id}/editpost', 'WorkordersController@editpost_order');
    Route::get('Work-order/{id}/hapus', 'WorkordersController@hapus_order');
    Route::get('history', 'WorkordersController@history');

    //INSPECTION
    Route::get('vehicle-inspection', 'WorkordersController@buat_inspection');
    Route::post('post-inspection', 'WorkordersController@post_inspection');

    //ESTIMASI BIAYA
    Route::get('estimasi-biaya', 'EstimasisController@buat_estimasi');
    Route::post('post-estimasi', 'EtimasisController@post_estimasi');
    Route::get('estimasi-biaya/pilih-sparepart', 'EstimasisController@pilih_sparepart');
    Route::post('post-pilih-sparepart', 'EstimasisController@post_pilih_sparepart');
    Route::get('estimasi-biaya/pilih-jasa', 'EstimasisController@pilih_jasa');
    Route::post('post-pilih-jasa', 'EstimasisController@post_pilih_jasa');

    //PURCHASE ORDER
    Route::get('purchase-order', 'PurchasesController@index');
    Route::get('buat-purchase-order', 'PurchasesController@buat_purchase_order');
    Route::post('post-purchase-order', 'PurchasesController@post_po');
});
