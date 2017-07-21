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
	Route::get('hapus/jasa/{id}', 'ReferensisController@hapus_jasa');

	Route::get('sparepart', 'ReferensisController@index_sparepart');
	Route::get('sparepart/tambah-sparepart', 'ReferensisController@tambah_sparepart');
	Route::post('post-sparepart', 'ReferensisController@post_sparepart');
	Route::get('sparepart/{id}/edit', 'ReferensisController@edit_sparepart');
	Route::post('sparepart/{id}/editpost', 'ReferensisController@editpost_sparepart');
	Route::get('hapus/sparepart/{id}', 'ReferensisController@hapus_sparepart');

	Route::get('supplier', 'ReferensisController@index_supplier');
	Route::get('supplier/tambah-supplier', 'ReferensisController@tambah_supplier');
	Route::post('post-supplier', 'ReferensisController@post_supplier');
	Route::get('supplier/{id}/edit', 'ReferensisController@edit_supplier');
	Route::post('supplier/{id}/editpost', 'ReferensisController@editpost_supplier');
	Route::get('hapus/supplier/{id}', 'ReferensisController@hapus_supplier');


    //WORKORDER
	Route::get('work-data', 'WorkordersController@index');
	Route::get('wo', 'WorkordersController@wo');
	Route::get('buat-order/{id}', 'WorkordersController@buat_order');
	Route::post('post-order', 'WorkordersController@post_order');
	Route::get('work-order/{id}', 'WorkordersController@show_order');
	Route::get('work-order/{id}/edit', 'WorkordersController@edit_order');
	Route::post('work-order/{id}/editpost', 'WorkordersController@editpost_order');
	Route::get('Work-order/{id}/hapus', 'WorkordersController@hapus_order');
	Route::get('history', 'WorkordersController@history');
	Route::get('work-order/cetak-wo/{id}', 'WorkordersController@cetak_wo');

    //INSPECTION
	Route::get('vehicle-inspection', 'WorkordersController@index_inspection');
	Route::get('buat-inspection/{id}', 'WorkordersController@buat_inspection');
	Route::get('detail/inspection/{id}', 'WorkordersController@detail_inspection');
	Route::get('hapus/inspection/{id}', 'WorkordersController@hapusinspection');
	Route::get('tambah-vehicle', 'WorkordersController@tambahvehicle');
	Route::post('tambah-vehicle', 'WorkordersController@posttambahvehicle');
	Route::post('post-inspection', 'WorkordersController@post_inspection');
	Route::get('vehicle-inspection/cetak-inspection/{id}', 'WorkordersController@cetak_inspection');

	//ESTIMASI BIAYA
	Route::get('estimasi-biaya', 'EstimasisController@index');
	Route::get('buat-estimasi-biaya/{id}', 'EstimasisController@buat_estimasi');
	Route::post('post-estimasi', 'EstimasisController@post_estimasi');
	Route::get('detail/estimasi/{id}', 'EstimasisController@detail_estimasi');
	Route::get('hapus/estimasi-biaya/{id}', 'EstimasisController@hapusestimasi');
	Route::get('estimasi-biaya/pilih-sparepart/{wo}/{idest}', 'EstimasisController@pilih_sparepart');
	Route::post('post-pilih-sparepart', 'EstimasisController@post_pilih_sparepart');
	Route::get('estimasi-biaya/pilih-jasa/{wo}/{idest}', 'EstimasisController@pilih_jasa');
	Route::post('post-pilih-jasa', 'EstimasisController@post_pilih_jasa');
	Route::get('estimasi-biaya/hapus-part/{id}', 'EstimasisController@hapusestpart');
	Route::get('estimasi-biaya/hapus-jasa/{id}', 'EstimasisController@hapusestjasa');
	Route::get('estimasi/cetak-estimasi/{id}', 'EstimasisController@cetak_estimasi');


	//PURCHASE ORDER
	Route::get('purchase-order', 'PurchasesController@index');
	Route::get('buat-purchase-order', 'PurchasesController@buat_purchase_order');
	Route::post('post-purchase-order', 'PurchasesController@post_purchase_order');
	// Route::get('purchase-order/{id}/edit', 'PurchasesController@edit_purchase_order');
	Route::get('detail-purchase-order/{id}', 'PurchasesController@detail_purchase_order');
	Route::get('hapus/purchase-order/{id}', 'PurchasesController@hapus_purchase_order');
	// Route::post('editpost/purchase-order/{id}', 'PurchasesController@editpost_purchase_order');
	Route::get('purchase-order/cetak-po/{id}', 'PurchasesController@cetak_po');

	//LAPORAN
	Route::get('laporan', 'LaporansController@index');

	//PENJUALAN
	Route::get('penjualan', 'PenjualansController@index');
	Route::get('penjualan/tambah-penjualan', 'PenjualansController@tambah_penjualan');
	Route::post('post-penjualan', 'PenjualansController@post_penjualan');
	Route::get('detail/penjualan/{id}', 'PenjualansController@detail_penjualan');
	Route::get('penjualan/jual-sparepart/{idpenj}', 'PenjualansController@jual_sparepart');
	Route::post('post-jual-sparepart', 'PenjualansController@post_jual_sparepart');
	// Route::post('editpost/penjualan/{id}', 'PenjualansController@editpost_penjualan');
	Route::get('hapus/penjualan/{id}', 'PenjualansController@hapus_penjualan');
	Route::get('penjualan/cetak-penjualan/{id}', 'PenjualansController@cetak_penjualan');
	Route::get('penjualan/hapus-part/{id}', 'PenjualansController@hapusestpart');

	//NOTA
	Route::get('buat-nota/{id}', 'NotaController@buat_nota');

	//USER
	Route::get('user-management', 'UserController@manage');
	Route::get('hapus/user/{id}', 'UserController@hapususer');
	Route::get('tambah/user', 'UserController@tambahuser');
	Route::post('tambah/user', 'UserController@tambahuserpost');
	Route::get('edit/user/{id}', 'UserController@edituser');
	Route::post('edit/user/{id}', 'UserController@edituserpost');


	//PRINT
	Route::get('/print-wo', function () {
		return view('print.workorder');
	});
	Route::get('/print-inspection', function () {
		return view('print.inspection');
	});

	Route::get('/print-estimasi', function () {
		return view('print.estimasi');
	});

	Route::get('/print-nota', function () {
		return view('print.nota');
	});

	Route::get('/print-po', function () {
		return view('print.po');
	});

	Route::get('/print-sparepart', function () {
		return view('print.sparepart');
	});

});
