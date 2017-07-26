<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pelanggan;
use App\Workorder;
use App\Inspection;
use App\Estimasi;
use App\Sparepart;
use App\EstPart;
use App\EstJasa;
use App\TipeVehicle;
use App\Foto;
use Validator;
use PDF;

class WorkordersController extends Controller
{
	public function index()
	{
	$orders = Workorder::all();
		$orders = Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->get();
		// dd($orders);
		return view ('work-order.work-data', compact('orders'));

	}

	public function wo()
	{
		
		$orders = Workorder::all();
		$orders = Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->get();
		return view ('work-order.wo', compact('orders'));

	}

	public function buat_order($id)
	{
		$pelanggan = Pelanggan::where('pelanggans.id', $id)->first();
		$order = Workorder::where('work_order.id', $id)
		->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
		return view ('work-order.buat-order', compact('order', 'pelanggan'));
		
	}

	public function post_order(Request $r)
	{
		// dd(request()->all());
		$cek = Workorder::where('no_wo',$r->no_wo)->first();

		if (count($cek) > 0) {
			return redirect()->back()->with('warning','Maaf Nomer Workorder yang anda masukan sudah ada');
		}

		if ($r->no_wo == '0') {
			return redirect()->back()->with('warning','Maaf Nomer Workorder yang anda masukan salah');
		}if ($r->km_datang == '0') {
			return redirect()->back()->with('warning','Maaf KM Kedatangan yang anda masukan salah');
		}if ($r->fuel_datang == '0') {
			return redirect()->back()->with('warning','Maaf Fuel Kedatangan yang anda masukan salah');
		}

		$order = new Workorder;
		$order->pelanggan_id  	= $r->pelanggan;
		$order->no_wo    	  	= $r->no_wo;
		$order->tanggal 		= date('Y-m-d');
		$order->km_datang     	= $r->km_datang;
		$order->fuel_datang   	= $r->fuel_datang;    
		$order->keluhan       	= $r->deskripsi;
		$order->save();

		return redirect()->back()->with('success','Berhasil tambah Workorder');
	}

	public function show_order($id)
	{
		$order = Workorder::where('work_order.no_wo', $id)
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

	public function index_inspection (){
		
		$inspection = Inspection::select('vehicle_inspection.tgl as tanggal', 'vehicle_inspection.keterangan as keterangan', 'vehicle_inspection.order_id as nomor_wo', 'vehicle_inspection.kode' )
		->groupBy('vehicle_inspection.kode')
		->get();


		return view ('vehicle.data-vehicle', compact('inspection'));

	}
	
	public function buat_inspection ($id){
		$wo = Workorder::where('work_order.id', $id)->
		join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*','work_order.id', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();

		$vecdok 	= TipeVehicle::where('type','Dokumen Kendaraan')->get();
		$vecdalam 	= TipeVehicle::where('type','Fungsi Aksesoris Bagian Dalam')->get();
		$vecluar 	= TipeVehicle::where('type','Fungsi Aksesoris Bagian Luar')->get();
		$vecperl 	= TipeVehicle::where('type','Perlengkapan Kendaraan')->get();

		return view ('vehicle.vehicle-inspection', compact('pelanggan','wo','vecdok','vecdalam','vecluar','vecperl'));

	}


	public function hapusinspection($id)
	{
		$inspection = Inspection::where('order_id',$id);
		$inspection->delete();

		return redirect()->back()->with('success','Berhasil menghapus Inspection');
	}

	public function detail_inspection($id)
	{
		// $inspection = Inspection::all();
		// $wo 		= Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		// ->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		$inspection = Inspection::where('order_id',$id)->first();
		// ->first();
		$inspect = Inspection::where('order_id',$id)
		->join('tipe_vehicle','vehicle_inspection.tipe_id','=','tipe_vehicle.id')
		->get();

		if (count($inspect) == 0) {
			return redirect()->back()->with('warning','Maaf data masih kosong');
		}

		$wo = Workorder::where('work_order.no_wo',$inspect[0]->order_id)
		->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();

		// dd($wo);

		$foto = Foto::where('inspect_id',$inspect[0]->kode)->get();
		// dd($foto);
		return view ('vehicle.detail-inspection' , compact('wo','inspect','foto', 'inspection')); 


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
		if (empty($r->keterangan)) {
			return redirect()->back()->with('warning','Keterangan belum anda isi');
		}
		// dd(request()->all());
		// error_reporting(1);
		// dd($noins);
		$cek_ins 	= Inspection::orderBy('id','DESC')->first();		
		if (count($cek_ins) == 0) {
			$noins 		= 'INS-0';
		}else{
			$noins 		= 'INS-'.$cek_ins->id;
		}

		foreach ($r->tipe as $k => $v) {

			$ins[$k] = new Inspection;
			$ins[$k]->kode 			= $noins;
			$ins[$k]->order_id 		= $r->workorder;
			$ins[$k]->tipe_id 		= $v;
			$ins[$k]->tgl 			= date('Y-m-d');
			$ins[$k]->keterangan 	= $r->keterangan;
			$ins[$k]->save();
		}
		// $cek = Inspection::where('order_id',$r->workorder)->orderBy('id','DESC')->first();

		foreach ($r->foto as $a => $val) {

			$gambar[$a] = $val->getClientOriginalName();
			$val->move(storage_path() . '/uploads/img/', $gambar[$a]);
			$foto[$a] = new Foto;
			$foto[$a]->inspect_id   = $noins;
			$foto[$a]->img 			= $gambar[$a];
			$foto[$a]->save();
		}

		return redirect()->back()->with('success','Berhasil Menambahkan');

	}
	public function cetak_wo($id, Request $request)
	{
		$est = Estimasi::where('estimasi_biaya.wo_id', $id)->first();
    	
		
		$order = Workorder::where('work_order.no_wo', $id)
		->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
	
		$est_part = EstPart::where('no_est', $est->no_est)
		->where('type', 'espart')
		->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual', 'spare_parts.no as nomor_part', 'est_part.qty as qty_part')->get();		
		$est_jasa = EstJasa::where('no_est', $est->no_est)
		->where('type', 'esjasa')
		->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr', 'est_jasa.qty as qty_jasa')->get();

		$pdf = PDF::loadView('print.workorder', compact('order', 'est', 'est_part', 'est_jasa'));
		return @$pdf->stream('WORKORDER-'.'pdf');
     
	}
	public function cetak_inspection($id, Request $request)
	{

		$inspection = Inspection::where('order_id',$id)->first();
		
		$pelanggan = Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*','work_order.id', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
		
		$inspect = Inspection::where('order_id',$id)
		->join('tipe_vehicle','vehicle_inspection.tipe_id','=','tipe_vehicle.id')
		->select('vehicle_inspection.*', 'tipe_vehicle.nama as nama_vehicle', 'tipe_vehicle.type as tipe_vehicle')
		->get();

		$foto = Foto::where('inspect_id',$inspect[0]->kode)->get();

		$pdf = PDF::loadView('print.inspection', compact('pelanggan', 'inspect', 'foto', 'inspection'));
		return @$pdf->stream('INSPECTION-'.'pdf');

	}

	
}
