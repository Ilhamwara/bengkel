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
		$estimasis = Estimasi::
		where('wo_id', '>', 0)
		// ->join('work_order','estimasi_biaya.wo_id','=','work_order.id')
		// ->join('pelanggans','work_order.pelanggan_id','=','pelanggans.id')
		->select('estimasi_biaya.id','estimasi_biaya.wo_id as nomor_wo','estimasi_biaya.keterangan','estimasi_biaya.updated_at', 'estimasi_biaya.no_est', 'estimasi_biaya.tanggal')
		->groupBy('estimasi_biaya.no_est')
		->get();

		return view('estimasi-biaya.estimasi-biaya', compact('estimasis'));


	}
	public function buat_estimasi($id){
		$cek = Estimasi::where('wo_id',$id)->where('ref_id', '>', 0)->first();

		if (count($cek) > 0) {
			return redirect()->back()->with('warning','Maaf estimasi biaya sudah dibuat');
		}
		$wo = Workorder::where('work_order.no_wo', $id)->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*','work_order.id', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
		// Dd($pelanggan);

		Estimasi::updateOrCreate([
			'no_est' => 'EST-A'
			]);

		$cek_est = Estimasi::orderBy('id','DESC')->first();
		// dd($cek_est->no_est);

		$est_part = EstPart::where('no_est',$cek_est->no_est)->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
		$est_jasa = EstJasa::where('no_est',$cek_est->no_est)->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();
		
		return view ('estimasi-biaya.buat-estimasi-biaya', compact('pelanggan','wo','cek_est','est_jasa','est_part'));

	}

	public function post_estimasi(Request $r)
	{
		// dd(request()->all());
		$cek = Estimasi::findOrFail($r->estid);
		if ($cek->wo_id > 0) {
			return redirect()->back()->with('warning','Maaf Nomer Workorder yang anda masukan sudah ada');
		}

		$cek_est 	= Estimasi::where('wo_id','>',0)->orderBy('id','DESC')->first();

		if (count($cek_est) > 0) {
			$expl 		= explode('-', $cek_est->no_est);
			$num		= $expl;
			$noest 		= 'EST-'.($num[1]+1);
		}else{
			$noest 		= 'EST-1';
		}

		if (count($r->est_part) > 0) {
			foreach ($r->est_part as $a => $b) {
				$estimasi[$a] = new Estimasi;
				$estimasi[$a]->no_est  			= $noest;
				$estimasi[$a]->wo_id  			= $r->order_id;
				$estimasi[$a]->ref_id  			= $b;
				$estimasi[$a]->type 			= 'part';
				$estimasi[$a]->keterangan	 	= $r->keterangan;
				$estimasi[$a]->tanggal	 	= $r->tanggal;
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
				$estimasi[$a]->tanggal	 	= $r->tanggal;
				$estimasi[$c]->save();
			}
		}
		EstJasa::where('no_est','EST-A')->update(['no_est' => $noest]);		
		EstPart::where('no_est','EST-A')->update(['no_est' => $noest]);		
		
		Estimasi::where('no_est','EST-A')->delete();
		return redirect('estimasi-biaya')->with('success','Berhasil buat estimasi');
	
	}

	public function detail_estimasi($id)
	{
		$est = Estimasi::where('estimasi_biaya.wo_id', $id)->first();
		if (count($est) == 0) {
			return redirect()->back()->with('warning','Maaf data masih kosong');
		}
		
		$estimasi = Workorder::where('work_order.no_wo', $id)->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
	
		$est_part = EstPart::where('no_est', $est->no_est)
		->where('type', 'espart')
		->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
		$est_jasa = EstJasa::where('no_est', $est->no_est)
		->where('type', 'esjasa')
		->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();
		
		return view ('estimasi-biaya.detail-estimasi' , compact('estimasi', 'est', 'est_part', 'est_jasa')); 
	}


	public function hapusestimasi($id)
	{
		$estimasi = Estimasi::findOrFail($id);
		$est_part = EstPart::where('no_est',$estimasi->no_est)->delete();
		$est_jasa = EstJasa::where('no_est',$estimasi->no_est)->delete();
		
		Estimasi::findOrFail($id)->delete();

		return redirect()->back()->with('success','Berhasil menghapus estimasi');
	}

	public function pilih_jasa ($wo,$idest){
		$jasas = Jasa::all();
		if (count($jasas) == 0) {
			return redirect('jasa/tambah-jasa')->with('warning','Maaf data jasa masih kosong silahkan isi terlebih dahulu');
		}
		return view ('estimasi-biaya.pilih-jasa', compact('jasas','idest','wo'));

	}
	public function pilih_sparepart($wo,$idest){
		$spareparts = Sparepart::all();
		if (count($spareparts) == 0) {
			return redirect('sparepart/tambah-sparepart')->with('warning','Maaf data sparepart masih kosong silahkan isi terlebih dahulu');
		}
		return view ('estimasi-biaya.pilih-sparepart', compact('spareparts','idest','wo'));

	}
	public function post_pilih_sparepart (Request $r)
	{		
		$est = new EstPart;
		$est->part_id   = $r->sparepart;
		$est->no_est    = $r->idest;
		$est->type 		= $r->tipe;
		$est->qty  		= $r->quantity_sparepart;
		$est->jumlah 	= $r->total_harga_sparepart;

		$part = Sparepart::where('id',$r->sparepart)->first();

		if($r->quantity_sparepart > $part->stok) {
			return redirect()->back()->with('warning','Maaf jumlah yang anda masukan tidak mencukupi dari stok barang');
		}

		$part->stok = ($part->stok - $r->quantity_sparepart);

		$part->save();
		$est->save();

		return redirect('buat-estimasi-biaya/' .$r->wo)->with('success','Berhasil menambahkan estimasi sparepart');
		
	}

	public function post_pilih_jasa (Request $r)
	{		
		// dd(request()->all());
		$est = new EstJasa;
		$est->jasa_id   = $r->jasa;
		$est->no_est    = $r->idest;
		$est->qty  		= $r->fr;
		$est->type 		= $r->tipe;
		$est->jumlah 	= ($r->fr*$r->harga_perfr);
		$est->save();

		return redirect('buat-estimasi-biaya/' .$r->wo)->with('success','Berhasil menambahkan estimasi jasa');
		
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
    	$est = Estimasi::where('estimasi_biaya.wo_id', $id)->first();
    	
		
		$estimasi = Workorder::where('work_order.no_wo', $id)
		->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
	
		$est_part = EstPart::where('no_est', $est->no_est)
		->where('type', 'espart')
		->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual', 'spare_parts.no as nomor_part', 'est_part.qty as qty_part')->get();		
		$est_jasa = EstJasa::where('no_est', $est->no_est)
		->where('type', 'esjasa')
		->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr', 'est_jasa.qty as qty_jasa')->get();


        $pdf = PDF::loadView('print.estimasi', compact('estimasi', 'est_part', 'est_jasa', 'est'));
        return @$pdf->stream('ESTIMASI-BIAYA-'.'pdf');

    }

    ////////////////////////////////////////////////EDIT/////////////////////////////////////////////////////////////////////////////////////////////


    public function edit_estimasi ($id){

		$wo = Workorder::where('work_order.no_wo', $id)->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*','work_order.id', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();

		$est = Estimasi::where('estimasi_biaya.wo_id', $id)->first();

		$est_part = EstPart::where('no_est',$est->no_est)
		->where('type', 'espart')
		->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
		$est_jasa = EstJasa::where('no_est',$est->no_est)
		->where('type', 'esjasa')
		->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();
		
		return view ('estimasi-biaya.edit-estimasi', compact('wo','est_jasa','est_part', 'est'));

	}

	public function postedit_estimasi (Request $request, $id){
		// $est = Estimasi::select('estimasi_biaya.keterangan', 'estimasi_biaya.no_est', 'estimasi_biaya.wo_id')->first();
		$estimasi = Workorder::where('work_order.no_wo', $id)->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
		// $est_part = EstPart::where('no_est',$id)->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
		// $est_jasa = EstJasa::where('no_est',$est->no_est)->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();
		// $estimasi->update($request->all());

		// $est->update($request->all());
		$estimasi->update($request->all());

		$est = Estimasi::where('wo_id',$id)->update([
				'keterangan' => $request->keter,
				'tanggal' => $request->tanggal,
			]);
		
	
		return redirect('estimasi-biaya')->with('success','Berhasil edit pelanggan');
	}

	public function pilih_jasaedit ($wo,$idest){
		$jasas = Jasa::all();
		if (count($jasas) == 0) {
			return redirect('jasa/tambah-jasa-edit')->with('warning','Maaf data jasa masih kosong silahkan isi terlebih dahulu');
		}
		return view ('estimasi-biaya.pilih-jasa-edit', compact('jasas','idest','wo'));

	}
	public function pilih_sparepartedit($wo,$idest){
		$spareparts = Sparepart::all();
		if (count($spareparts) == 0) {
			return redirect('sparepart/tambah-sparepart-edit')->with('warning','Maaf data sparepart masih kosong silahkan isi terlebih dahulu');
		}
		return view ('estimasi-biaya.pilih-sparepart-edit', compact('spareparts','idest','wo'));

	}

	public function post_pilih_sparepartedit (Request $r)
	{		
		$est = new EstPart;
		$est->part_id   = $r->sparepart;
		$est->no_est    = $r->idest;
		$est->type 		= $r->tipe;
		$est->qty  		= $r->quantity_sparepart;
		$est->jumlah 	= $r->total_harga_sparepart;

		$part = Sparepart::where('id',$r->sparepart)->first();

		if($r->quantity_sparepart > $part->stok) {
			return redirect()->back()->with('warning','Maaf jumlah yang anda masukan tidak mencukupi dari stok barang');
		}

		$part->stok = ($part->stok - $r->quantity_sparepart);

		$part->save();
		$est->save();

		return redirect('edit/estimasi/' .$r->wo)->with('success','Berhasil menambahkan estimasi sparepart');
		
	}

	public function post_pilih_jasaedit (Request $r)
	{		
		// dd($r->harga_perfr);
		$est = new EstJasa;
		$est->jasa_id   = $r->jasa;
		$est->no_est    = $r->idest;
		$est->type 		= $r->tipe;
		$est->qty  		= $r->fr;
		$est->jumlah 	= ($r->fr*$r->harga_perfr);
		$est->save();

		return redirect('edit/estimasi/' .$r->wo)->with('success','Berhasil menambahkan estimasi jasa');
		
	}


	public function hapusesteditpart($id)
	{
		$est = EstPart::findOrFail($id);

		$part = Sparepart::where('id',$est->part_id)->first();
		$part->stok = ($part->stok + $est->qty);
		$part->save();

		$est->delete();

		return redirect()->back()->with('success','Berhasil mengahpus estimasi sparepart');
	}
	public function hapusesteditjasa($id)
	{
		$jasa = EstJasa::findOrFail($id);
		$jasa->delete();

		return redirect()->back()->with('success','Berhasil mengahpus estimasi jasa');
	}

}
