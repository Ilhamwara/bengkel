<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pelanggan;
use App\Workorder;
use App\Inspection;
use App\Estimasi;
use App\Sparepart;
use App\Jasa;
use Validator;

class EstimasisController extends Controller
{
	public function buat_estimasi (){
		$pelanggan = Pelanggan::all();
		$workorder = Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->get();
		$estimasi = Estimasi::
		join('work_order', 'estimasi_biaya.order_id', 'work_order.id')
		->join('spare_parts', 'estimasi_biaya.sparepart_id', 'spare_parts.id')
		->join('jasa', 'estimasi_biaya.jasa_id', 'jasa.id')
		->select('estimasi_biaya.*', 'work_order.pelanggan_id', 'work_order.no_wo as nomor_wo', 'work_order.km_datang', 'work_order.tanggal', 'work_order.fuel_datang', 'spare_parts.id as sparepart_id','spare_parts.nama as nama_sparepart', 'spare_parts.no as no_sparepart', 'spare_parts.harga_jual as harga_sparepart', 'jasa.nama_jasa', 'jasa.harga_perfr')
		->get();
		return view ('estimasi-biaya.buat-estimasi-biaya', compact('estimasi', 'pelanggan','workorder'));

	}

	public function post_estimasi (){


	}

	public function pilih_sparepart (){

		$spareparts = Sparepart::all();
		return view ('estimasi-biaya.pilih-sparepart', compact('spareparts'));

	}
	public function post_pilih_sparepart (Request $request)
	{
		

		$cek = Estimasi::where('sparepart_id',$request->sparepart)->where('order_id',$request->order)->first();
		$pilih = new Estimasi;
		$pilih->sparepart_id    		= $request->sparepart;
		$pilih->order_id    		= $request->order;
		$pilih->quantity_sparepart  	= $request->quantity_sparepart;
		$pilih->total_harga_sparepart   = $request->total_harga_sparepart;
		$pilih->save();
		$validator = Validator::make($request->all(), [
			'sparepart_id'   => 'required',
			'order_id'    		=> 'required',
			'quantity_sparepart'        => 'required',
			'total_harga_sparepart'      => 'required',
			]);

		if ($validator->fails()) {
			return redirect('/estimasi-biaya')
			->withErrors($validator)
			->withInput();
		}

		$pilih->save();
		return redirect()->back()->with('success','Berhasil tambah');
	}

	public function pilih_jasa (){

		$jasas = Jasa::all();
		return view ('estimasi-biaya.pilih-jasa', compact('jasas'));

	}


}
