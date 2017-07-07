<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Workorder;
use Validator;

class WorkordersController extends Controller
{
    public function index()
	{
		
		$orders = Workorder::all();
		$orders = Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->get();
		return view ('work-order.work-data', compact('orders'));

	}


	public function buat_order()
	{
		$pelanggan = Pelanggan::all();
		$orders = Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->get();
		return view ('work-order.buat-order', compact('orders', 'pelanggan'));
		
	}

	public function post_order(Request $request)
	{
		$cek = Workorder::where('pelanggan_id',$request->pelanggan)->first();
		$order = new Workorder;
        $order->pelanggan_id    = $request->pelanggan;
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
			return redirect('work-data/buat-order')
			->withErrors($validator)
			->withInput();
		}

		$order->save();
		return redirect()->back()->with('success','Berhasil tambah');
	}

	public function edit_order($id)
	{
		$jasa = Workorder::where('jasa.id', $id)
		->first();
		return view ('referensi.edit-jasa' , compact('jasa')); 
	}


	public function editpost_order(Request $request, $id)
	{

		$jasa = Workorder::where('jasa.id', $id)->first();
		$jasa->update($request->all());
		return redirect()->back()->with('success','Berhasil tambah');
	}

	public function hapus_order($id)
	{
		$jasa = Workorder::where('jasa.id', $id)->first();
		$jasa->delete();
		return redirect('/jasa');
	}
	
}
