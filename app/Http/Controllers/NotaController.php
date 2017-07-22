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

class NotaController extends Controller
{
	public function buat_nota($id){
		$wo = Workorder::where('work_order.no_wo', $id)->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*','work_order.id', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
		// Dd($pelanggan);
		$est = Estimasi::where('estimasi_biaya.wo_id', $id)->first();
		$not = Nota::where('nota.wo_id', $id)->first();
		Nota::updateOrCreate([
			'no_not' => 'NOT-A'
			]);

		$cek_not = Nota::orderBy('id','DESC')->first();
		// dd($cek_est->no_est);

		$est_part = EstPart::where('no_est',$est->no_est)->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
		$est_jasa = EstJasa::where('no_est',$est->no_est)->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();

	
		
		return view ('nota.buat-nota', compact('wo','cek_not','est_jasa','est_part', 'not_part', 'not_jasa'));

	}

	public function pilih_jasa ($wo,$idnot){
		$jasas = Jasa::all();
		if (count($jasas) == 0) {
			return redirect('jasa/tambah-jasa')->with('warning','Maaf data jasa masih kosong silahkan isi terlebih dahulu');
		}
		return view ('nota.pilih-jasa', compact('jasas','idnot','wo'));

	}

	public function post_pilih_sparepart (Request $r)
	{		
		$not = new EstPart;
		$not->part_id   = $r->sparepart;
		$not->no_est    = $r->idnot;
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
}
