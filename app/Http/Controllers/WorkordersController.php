<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pelanggan;
use App\Workorder;
use App\Inspection;
use App\Estimasi;
use App\Sparepart;
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
		$cek = Workorder::where('pelanggan_id',$request->pelanggan)->first();
		$order = new Workorder;
		$order->pelanggan_id    = $request->pelanggan;
		$order->no_wo    = $request->no_wo;
		$order->tanggal 		= $request->tanggal;
		$order->km_datang       = $request->km_datang;
		$order->fuel_datang     = $request->fuel_datang;    
		$order->keluhan         = $request->keluhan;
		$order->save();
		$validator = Validator::make($request->all(), [
			'pelanggan_id'   => 'required',
			'tanggal'        => 'required',
			'km_datang'      => 'required',
			'fuel_datang'    => 'required',
			'keluhan'        => 'required',
			]);

		if ($validator->fails()) {
			return redirect('/buat-order')
			->withErrors($validator)
			->withInput();
		}

		$order->save();
		return redirect()->back()->with('success','Berhasil tambah');
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
		->select('work_order.*', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->get();
		$inspection = Inspection::
		join('work_order', 'vehicle_inspection.order_id', 'work_order.id')
		->select('vehicle_inspection.*', 'work_order.pelanggan_id', 'work_order.no_wo as nomor_wo', 'work_order.km_datang', 'work_order.tanggal', 'work_order.fuel_datang')
		->get();
		return view ('vehicle-inspection', compact('inspection', 'pelanggan','workorder'));

	}
	public function post_inspection (){


	}

	
}
