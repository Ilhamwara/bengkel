<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EstPart;
use App\EstJasa;
use App\Nota;
use App\Workorder;
use App\Estimasi;
use App\Sparepart;
use App\Jasa;
use PDF;

class NotaController extends Controller
{

	public function index(){

		$nota = Nota::
		where('wo_id', '>', 0)
		// ->join('work_order','estimasi_biaya.wo_id','=','work_order.id')
		// ->join('pelanggans','work_order.pelanggan_id','=','pelanggans.id')
		->select('nota.id','nota.wo_id as nomor_wo','nota.keterangan','nota.updated_at', 'nota.no_not')
		->groupBy('nota.no_not')
		->get();

		return view('nota.nota', compact('nota'));
	}

	public function buat_nota($id){
		$wo = Workorder::where('work_order.no_wo', $id)->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*','work_order.id', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();

		$est = Estimasi::where('estimasi_biaya.wo_id', $id)->first();

		$est_part = EstPart::where('no_est',$est->no_est)
				->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
		$est_jasa = EstJasa::where('no_est',$est->no_est)->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();
		
		return view ('nota.buat-nota', compact('wo','est_jasa','est_part', 'est'));

	}

	public function pilih_jasa ($wo,$idnot){
		$jasas = Jasa::all();
		if (count($jasas) == 0) {
			return redirect('jasa/tambah-jasa')->with('warning','Maaf data jasa masih kosong silahkan isi terlebih dahulu');
		}
		return view ('nota.pilih-jasa', compact('jasas','idnot','wo'));

	}

	public function post_pilih_jasa (Request $r)
	{		
		$not = new EstJasa;
		$not->jasa_id   = $r->jasa;
		$not->no_est    = $r->idest;
		$not->type 		= $r->tipe;
		$not->qty  		= $r->fr;
		$not->jumlah 	= $r->total_harga_jasa;
		$not->save();

		return redirect('buat-nota/' .$r->wo)->with('success','Berhasil menambahkan estimasi jasa');
		
	}

	public function post_pilih_sparepart (Request $r)
	{		
		$not = new EstPart;
		$not->part_id   = $r->sparepart;
		$not->no_est    = $r->idnot;
		$not->type 		= $r->tipe;
		$not->qty  		= $r->quantity_sparepart;
		$not->jumlah 	= $r->total_harga_sparepart;

		$part = Sparepart::where('id',$r->sparepart)->first();

		if($r->quantity_sparepart > $part->stok) {
			return redirect()->back()->with('warning','Maaf jumlah yang anda masukan tidak mencukupi dari stok barang');
		}

		$part->stok = ($part->stok - $r->quantity_sparepart);

		$part->save();
		$not->save();

		return redirect('buat-nota/' .$r->wo)->with('success','Berhasil menambahkan estimasi sparepart');
		
	}

	public function pilih_sparepart($wo,$idnot){
		$spareparts = Sparepart::all();
		if (count($spareparts) == 0) {
			return redirect('sparepart/tambah-sparepart')->with('warning','Maaf data sparepart masih kosong silahkan isi terlebih dahulu');
		}
		return view ('nota.pilih-part', compact('spareparts','idnot','wo'));

	}

		public function post_nota(Request $r)
	{
		// dd(request()->all());
		// $cek = Nota::findOrFail($r->estid);
		// if ($cek->wo_id > 0) {
		// 	return redirect()->back()->with('warning','Maaf Nomer Workorder yang anda masukan sudah ada');
		// }

		$cek_est 	= Nota::where('wo_id','>',0)->orderBy('id','DESC')->first();

		if (count($cek_est) > 0) {
			$expl 		= explode('-', $cek_est->no_not);
			$num		= $expl;
			$noest 		= 'NOT-'.($num[1]+1);
		}else{
			$noest 		= 'NOT-1';
		}

		if (count($r->est_part) > 0) {
			foreach ($r->est_part as $a => $b) {
				$nota[$a] = new Nota;
				$nota[$a]->no_not  			= $noest;
				$nota[$a]->wo_id  			= $r->order_id;
				$nota[$a]->ref_id  			= $b;
				$nota[$a]->type 			= 'notapart';
				$nota[$a]->keterangan	 	= $r->keterangan;
				$nota[$a]->dp	 			= $r->dp;
				$nota[$a]->disc_part	 		= $r->discount_part;
				$nota[$a]->disc_jasa	 		= $r->discount_jasa;
				$nota[$a]->tanggal	 		= $r->tanggal_nota;
				$nota[$a]->save();
			}
		}
		if (count($r->est_jasa) > 0) {
			foreach ($r->est_jasa as $c => $d) {
				$nota[$c] = new Nota;
				$nota[$c]->no_not  			= $noest;
				$nota[$c]->wo_id  			= $r->order_id;
				$nota[$c]->ref_id  			= $d;
				$nota[$c]->type 			= 'notajasa';
				$nota[$c]->keterangan	 	= $r->keterangan;
				$nota[$c]->dp	 			= $r->dp;
				$nota[$c]->disc_part	 	= $r->discount_part;
				$nota[$c]->disc_jasa	 	= $r->discount_jasa;
				$nota[$c]->tanggal	 		= $r->tanggal_nota;
				$nota[$c]->save();
			}
		}
		EstJasa::where('no_est','NOT-A')->update(['no_est' => $noest]);		
		EstPart::where('no_est','NOT-A')->update(['no_est' => $noest]);		
		
		Nota::where('no_not','NOT-A')->delete();
		return redirect()->back()->with('success','Berhasil tambah Biaya Estimasi');
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

	public function detail_nota ($id){

		$nota = Nota::where('nota.wo_id', $id)->first();

		$est = Estimasi::where('estimasi_biaya.wo_id', $id)->first();
		if (count($est) == 0) {
			return redirect()->back()->with('warning','Maaf data masih kosong');
		}
		
		$wo = Workorder::where('work_order.no_wo', $id)->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
	
		$est_part = EstPart::where('no_est', $est->no_est)
		->orwhere('no_est',$nota->no_not)
		->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
		$est_jasa = EstJasa::where('no_est', $est->no_est)
		->orwhere('no_est',$nota->no_not)
		->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();
		
		return view ('nota.detail-nota' , compact('wo', 'est', 'est_part', 'est_jasa', 'nota')); 
	}

	public function hapus_nota($id)
	{
		$nota = Nota::where('wo_id', $id)
		->first();
		$est_part = EstPart::where('no_est',$nota->no_not)
		->orwhere('type', 'notpart')
		->delete();
		$est_jasa = EstJasa::where('no_est',$nota->no_not)
		->orwhere('type', 'notjasa')
		->delete();
		
		$nota->delete();

		return redirect()->back()->with('success','Berhasil menghapus Nota');
	}

	public function cetak_nota($id, Request $request)
    {
    	$est = Estimasi::where('estimasi_biaya.wo_id', $id)->first();
    	
    	$nota = Nota::where('nota.wo_id', $id)->first();
		
		$wo = Workorder::where('work_order.no_wo', $id)
		->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
	
		$est_part = EstPart::where('no_est', $est->no_est)
		->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual', 'spare_parts.no as nomor_part', 'est_part.qty as qty_part')->get();		
		$est_jasa = EstJasa::where('no_est', $est->no_est)
		->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr', 'est_jasa.qty as qty_jasa')->get();


        $pdf = PDF::loadView('print.nota', compact('wo', 'est_part', 'est_jasa', 'est', 'nota'));
        return @$pdf->stream('NOTA SERVICE-'.'pdf');

    }

	////////////////////////////////////////////////EDIT/////////////////////////////////////////////////////
	public function edit_nota($id){

	$wo = Workorder::where('work_order.no_wo', $id)->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*','work_order.id', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();

		$nota = Nota::where('nota.wo_id', $id)->first();
		$est = Estimasi::where('estimasi_biaya.wo_id', $id)->first();

		$est_part = EstPart::where('no_est',$est->no_est)
		->orwhere('no_est',$nota->no_not)
		->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
		$est_jasa = EstJasa::where('no_est',$est->no_est)
		->orwhere('no_est',$nota->no_not)
		->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();
		
		return view ('nota.edit-nota', compact('wo','est_jasa','est_part', 'est', 'nota'));

	}
	public function pilih_sparepartedit($wo,$idest){
		$spareparts = Sparepart::all();
		if (count($spareparts) == 0) {
			return redirect('sparepart/tambah-sparepart-edit')->with('warning','Maaf data sparepart masih kosong silahkan isi terlebih dahulu');
		}
		return view ('nota.pilih-part-edit', compact('spareparts','idest','wo'));

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

		return redirect('edit/nota/' .$r->wo)->with('success','Berhasil menambahkan estimasi sparepart');
		
	}

	public function pilih_jasaedit ($wo,$idest){
		$jasas = Jasa::all();
		if (count($jasas) == 0) {
			return redirect('jasa/tambah-jasa-edit')->with('warning','Maaf data jasa masih kosong silahkan isi terlebih dahulu');
		}
		return view ('nota.pilih-jasa-edit', compact('jasas','idest','wo'));

	}

	public function post_pilih_jasaedit (Request $r)
	{		
		$est = new EstJasa;
		$est->jasa_id   = $r->jasa;
		$est->no_est    = $r->idest;
		$est->type 		= $r->tipe;
		$est->qty  		= $r->fr;
		$est->jumlah 	= $r->total_harga_jasa;
		$est->save();

		return redirect('edit/nota/' .$r->wo)->with('success','Berhasil menambahkan estimasi jasa');
		
	}

	public function postedit_nota (Request $request, $id){
		$est = Nota::
		select('nota.keterangan as keterangan', 'nota.no_not', 'nota.wo_id')
		->first();
		$nota = Workorder::where('work_order.no_wo', $id)->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*', 'pelanggans.nama as nama_pelanggan', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
		// $est_part = EstPart::where('no_est',$id)->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
		// $est_jasa = EstJasa::where('no_est',$est->no_est)->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();
	
		// $estimasi->update($request->all());
		$est->update($request->all());
		$nota->update($request->all());
		
	
		return redirect('nota')->with('success','Berhasil edit pelanggan');
	}

	public function hapusnotapart($id)
	{
		$est = EstPart::findOrFail($id);

		$part = Sparepart::where('id',$est->part_id)->first();
		$part->stok = ($part->stok + $est->qty);
		$part->save();

		$est->delete();

		return redirect()->back()->with('success','Berhasil mengahpus estimasi sparepart');
	}
	public function hapusnotajasa($id)
	{
		$jasa = EstJasa::findOrFail($id);
		$jasa->delete();

		return redirect()->back()->with('success','Berhasil mengahpus estimasi jasa');
	}
}
