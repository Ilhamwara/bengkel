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
use App\EstJasa;
use App\EstPart;
use Validator;

class EstimasisController extends Controller
{
	public function index(){

		$estimasis = Estimasi::join('work_order', 'estimasi_biaya.wo_id', 'work_order.id')
		->join('spare_parts', 'estimasi_biaya.est_part_id', 'spare_parts.id')
		->join('jasa', 'estimasi_biaya.est_jasa_id', 'jasa.id')
		->select('estimasi_biaya.*', 'work_order.pelanggan_id', 'work_order.no_wo as nomor_wo', 'work_order.km_datang', 'work_order.tanggal', 'work_order.fuel_datang', 'spare_parts.id as sparepart_id','spare_parts.nama as nama_sparepart', 'spare_parts.no as no_sparepart', 'spare_parts.harga_jual as harga_sparepart', 'jasa.nama_jasa', 'jasa.harga_perfr')
		->get();

		return view('estimasi-biaya.estimasi-biaya', compact('estimasis'));


	}
	public function buat_estimasi (){
		$pelanggan = Pelanggan::all();
		$workorder = Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->get();

		$cek_est = Estimasi::orderBy('id','DESC')->first();

		Estimasi::updateOrCreate([
				'wo_id' => 0,
			],[
				'no_est' => 'EST-'.date('dmy').'-'.$cek_est->wo_id
			]);

		$est_part = EstPart::join('spare_parts','est_part.part_id','=','spare_parts.id')->where('no_est',$cek_est->no_est)->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();
		
		$est_jasa = EstJasa::join('jasa','est_jasa.jasa_id','=','jasa.id')->where('no_est',$cek_est->no_est)->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();
		
		return view ('estimasi-biaya.buat-estimasi-biaya', compact('pelanggan','workorder','cek_est','est_jasa','est_part'));

	}

	public function post_estimasi(Request $r)
	{
		// dd(request()->all());
		// $cek = Estimasi::where('wo_id',$r->wo_id)->first();

		// if (count($cek) > 0) {
		// 	return redirect()->back()->with('warning','Maaf Nomer Workorder yang anda masukan sudah ada');
		// }

		// $estimasi = new Estimasi;
		// $estimasi->no_est 			= $r->no_est
		// $estimasi->wo_id  			= $r->wo_id;
		// $estimasi->est_part_id    	= $r->est_part_id;
		// $estimasi->est_jasa_id 		= $r->est_jasa_id;
		// $estimasi->keterangan	 	= $r->keterangan;
		// $estimasi->save();

		return redirect()->back()->with('success','Berhasil tambah Workorder');
	}


	public function pilih_jasa ($idest){
		$jasas = Jasa::all();
		return view ('estimasi-biaya.pilih-jasa', compact('jasas','idest'));

	}
	public function pilih_sparepart($idest){

		$spareparts = Sparepart::all();
		return view ('estimasi-biaya.pilih-sparepart', compact('spareparts','idest'));

	}
	public function post_pilih_sparepart (Request $r)
	{
		
		$est = new EstPart;
		$est->part_id   = $r->sparepart;
		$est->no_est    = $r->idest;
		$est->qty  		= $r->quantity_sparepart;
		$est->jumlah 	= $r->total_harga_sparepart;

		$part = Sparepart::where('id',$r->sparepart)->first();

		if($r->quantity_sparepart > $part->stok) {
			return redirect()->back()->with('warning','Maaf jumlah yang anda masukan tidak mencukupi dari stok barang');
		}

		$part->stok = ($part->stok - $r->quantity_sparepart);

		$part->save();
		$est->save();

		return redirect('buat-estimasi-biaya')->with('success','Berhasil menambahkan estimasi sparepart');
		
	}

		public function post_pilih_jasa (Request $r)
	{
		
		$est = new EstJasa;
		$est->jasa_id   = $r->jasa;
		$est->no_est    = $r->idest;
		$est->qty  		= $r->fr;
		$est->jumlah 	= $r->total_harga_jasa;
		$est->save();

		return redirect('buat-estimasi-biaya')->with('success','Berhasil menambahkan estimasi jasa');
		
	}

	public function hapusestpart($id)
	{
		$est = EstPart::findOrFail($id);

		$part = Sparepart::where('id',$est->part_id)->first();
		$part->stok = ($part->stok + $est->qty);
		$part->save();

		$est->delete();

		return redirect()->back()->with('success','Berhasil mengahpus estimasi sparepart');
	}
	public function hapusestjasa($id)
	{
		$jasa = EstJasa::findOrFail($id);
		$jasa->delete();

		return redirect()->back()->with('success','Berhasil mengahpus estimasi jasa');
	}

}
