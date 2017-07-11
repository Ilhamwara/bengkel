<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pelanggan;
use App\Workorder;
use App\Inspection;
use App\Estimasi;
use App\Sparepart;
use App\TipeVehicle;
use App\Foto;
use Validator;

class WorkordersController extends Controller
{
	public function index()
	{
		
		$orders = Workorder::all();
		$orders = Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->get();
		return view ('work-order.work-data', compact('orders'));

	}


	public function buat_order()
	{
		$pelanggan = Pelanggan::all();
		$orders = Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
		return view ('work-order.buat-order', compact('orders', 'pelanggan'));
		
	}

	public function post_order(Request $request)
	{
		dd(request()->all());
		// $cek = Workorder::where('pelanggan_id',$request->pelanggan)->first();
		// $order = Workorder::make($request->all);
		// // $order->pelanggan_id    = $request->pelanggan;
		// // $order->no_wo    = $request->no_wo;
		// // $order->tanggal 		= $request->tanggal;
		// // $order->km_datang       = $request->km_datang;
		// // $order->fuel_datang     = $request->fuel_datang;    
		// // $order->keluhan         = $request->keluhan;
		// $order->save();
		// $validator = Validator::make($request->all(), [
		// 	'pelanggan_id'   => 'required',
		// 	'tanggal'        => 'required',
		// 	'km_datang'      => 'required',
		// 	'fuel_datang'    => 'required',
		// 	'keluhan'        => 'required',
		// 	]);

		// if ($validator->fails()) {
		// 	return redirect('/buat-order')
		// 	->withErrors($validator)
		// 	->withInput();
		// }

		// $order->save();
		// return redirect()->back()->with('success','Berhasil tambah');
	}

	public function show_order($id)
	{
		$order = Workorder::where('work_order.id', $id)
		->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
		return view ('work-order.show-order' , compact('order')); 
	}

	public function history (){
		$orders = Workorder::all();
		$orders = Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->get();
		return view ('work-order.history', compact('orders'));

	}
	
	public function buat_inspection (){
		$pelanggan = Pelanggan::all();
		
		$workorder = Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*','work_order.id', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->get();
		
		$inspection = Inspection::
		join('work_order', 'vehicle_inspection.order_id', 'work_order.id')
		->select('vehicle_inspection.*', 'work_order.pelanggan_id', 'work_order.no_wo as nomor_wo', 'work_order.km_datang', 'work_order.tanggal', 'work_order.fuel_datang')
		->get();

		$vecdok 	= TipeVehicle::where('type','Dokumen Kendaraan')->get();
		$vecdalam 	= TipeVehicle::where('type','Fungsi Aksesoris Bagian Dalam')->get();
		$vecluar 	= TipeVehicle::where('type','Fungsi Aksesoris Bagian Luar')->get();
		$vecperl 	= TipeVehicle::where('type','Perlengkapan Kendaraan')->get();

		return view ('vehicle.vehicle-inspection', compact('inspection', 'pelanggan','workorder','vecdok','vecdalam','vecluar','vecperl'));

	}
	public function tambahvehicle()
	{
		return view('vehicle.tambah');
	}
	public function posttambahvehicle(Request $r)
	{
		$cek = TipeVehicle::where('nama',$r->nama)->where('type',$r->tipe)->first();

		if (count($cek) > 0) {
			return redirect()->back()->with('warning','Data yang anda masukan sudah ada');
		}

		$vec = new TipeVehicle;
		$vec->type = $r->tipe;
		$vec->nama = $r->nama;
		$vec->save();

		return redirect()->back()->with('success','Berhasil menambahkan');
	}
	public function post_inspection (Request $r){
		// dd(request()->all());
		error_reporting(1);
		foreach ($r->tipe as $k => $v) {
			$ins[$k] = new Inspection;
			$ins[$k]->order_id 		= $r->workorder;
			$ins[$k]->tipe_id 		= $v;
			$ins[$k]->keterangan 	= $r->keterangan;
			$ins[$k]->save();
		}
		$cek = Inspection::where('order_id',$r->workorder)->orderBy('id','DESC')->first();

		foreach ($r->foto as $a => $val) {

		$gambar[$a] = $val->getClientOriginalName();
		$val->move(storage_path() . '/uploads/img/', $gambar[$a]);
			$foto[$a] = new Foto;
			$foto[$a]->inspect_id = $cek->id;
			$foto[$a]->img 		= $gambar[$a];
			$foto[$a]->save();
		}

	}

	
}
