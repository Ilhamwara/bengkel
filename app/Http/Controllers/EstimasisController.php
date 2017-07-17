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
use PDF;

class EstimasisController extends Controller
{
	public function index(){
		$estimasis = Estimasi::join('work_order','estimasi_biaya.wo_id','=','work_order.id')
		->join('pelanggans','work_order.pelanggan_id','=','pelanggans.id')
		->select('estimasi_biaya.id','work_order.no_wo','estimasi_biaya.keterangan','pelanggans.nama','pelanggans.no_pol','estimasi_biaya.created_at')
		->groupBy('estimasi_biaya.no_est')
		->get();

		// $estimasis = Estimasi::join('work_order', 'estimasi_biaya.wo_id', 'work_order.id')
		// ->join('est_part', 'estimasi_biaya.no_est', 'est_part.no_est')
		// ->join('est_jasa', 'estimasi_biaya.no_est', 'est_jasa.no_est')
		// ->join('spare_parts', 'est_part.part_id', 'spare_parts.id')
		// ->join('jasa', 'est_jasa.jasa_id', 'jasa.id')
		// ->select('estimasi_biaya.*', 'work_order.pelanggan_id', 'work_order.no_wo as nomor_wo', 'work_order.km_datang', 'work_order.tanggal', 'work_order.fuel_datang', 'spare_parts.id as sparepart_id','spare_parts.nama as nama_sparepart', 'spare_parts.no as no_sparepart', 'spare_parts.harga_jual as harga_sparepart', 'jasa.nama_jasa', 'jasa.harga_perfr')
		// ->get();

		return view('estimasi-biaya.estimasi-biaya', compact('estimasis'));


	}
	public function buat_estimasi (){
		$pelanggan = Pelanggan::all();
		$workorder = Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->get();

		Estimasi::updateOrCreate([
			'no_est' => 'EST-A'
			]);

		$cek_est = Estimasi::orderBy('id','DESC')->first();
		// dd($cek_est->no_est);

		$est_part = EstPart::where('no_est',$cek_est->no_est)->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
		$est_jasa = EstJasa::where('no_est',$cek_est->no_est)->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();
		
		return view ('estimasi-biaya.buat-estimasi-biaya', compact('pelanggan','workorder','cek_est','est_jasa','est_part'));

	}

	public function post_estimasi(Request $r)
	{
		// dd(request()->all());
		$cek = Estimasi::findOrFail($r->estid);
		if ($cek->wo_id > 0) {
			return redirect()->back()->with('warning','Maaf Nomer Workorder yang anda masukan sudah ada');
		}
		$cek_est 	= Estimasi::where('wo_id','>',0)->orderBy('id','DESC')->first();
		$expl 		= explode('-', $cek_est->no_est);
		$num		= $expl;
		$noest 		= 'EST-'.($num[2]+1);

		if (count($r->est_part) > 0) {
			foreach ($r->est_part as $a => $b) {
				$estimasi[$a] = new Estimasi;
				$estimasi[$a]->no_est  			= $noest;
				$estimasi[$a]->wo_id  			= $r->order_id;
				$estimasi[$a]->ref_id  			= $b;
				$estimasi[$a]->type 			= 'part';
				$estimasi[$a]->keterangan	 	= $r->keterangan;
				$estimasi[$a]->save();
			}
		}
		if (count($r->est_jasa) > 0) {
			foreach ($r->est_jasa as $c => $d) {
				$estimasi[$c] = new Estimasi;
				$estimasi[$c]->no_est  			= $noest;
				$estimasi[$c]->wo_id  			= $r->order_id;
				$estimasi[$c]->ref_id  			= $d;
				$estimasi[$c]->type 			= 'jasa';
				$estimasi[$c]->keterangan	 	= $r->keterangan;
				$estimasi[$c]->save();
			}
		}

		Estimasi::where('wo_id',0)->delete();
		return redirect()->back()->with('success','Berhasil tambah Workorder');
	}

	public function detail_estimasi($id)
	{
		$est = Estimasi::where('estimasi_biaya.id', $id)->first();
		$estimasi = Workorder::join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
	
		$est_part = EstPart::where('no_est', $est->no_est)->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
		$est_jasa = EstJasa::where('no_est', $est->no_est)->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();
		
		return view ('estimasi-biaya.detail-estimasi' , compact('estimasi', 'est', 'est_part', 'est_jasa')); 
	}

	public function hapusestimasi($id)
	{
		$estimasi = Estimasi::findOrFail($id);
		$est_part = EstPart::where('no_est',$estimasi->no_est)->get();
		$est_jasa = EstJasa::where('no_est',$estimasi->no_est)->get();

		$est_part->delete();
		$est_jasa->delete();
		$estimasi->delete();

		return redirect()->back()->with('success','Berhasil menghapus estimasi');
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

	public function cetak_estimasi($id, Request $request)
    {
    	$order = Workorder::where('work_order.id', $id)
		->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
		$est_part = EstPart::where('no_est',$no_est)->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
		$est_jasa = EstJasa::where('no_est',$no_est)->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();
        // dd(Hashids::connection('spd')->decode($id));
        // $wo = Workorder::findOrFail(Hashids::connection('workorder')->decode($id)[0]);
        $pdf = PDF::loadView('print.estimasi', compact('order', 'est_part', 'est_jasa'));
        return @$pdf->stream('WORKORDER-'.'pdf');
        // return view('print.spd', compact('spd'));
    }

}
