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

class NotaController extends Controller
{
	public function buat_nota($id){
		$wo = Workorder::where('work_order.no_wo', $id)->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*','work_order.id', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();

		$est = Estimasi::where('estimasi_biaya.wo_id', $id)->first();

		$est_part = EstPart::where('no_est',$est->no_est)->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
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
		$est = new EstJasa;
		$est->jasa_id   = $r->jasa;
		$est->no_est    = $r->idest;
		$est->type 		= $r->tipe;
		$est->qty  		= $r->fr;
		$est->jumlah 	= $r->total_harga_jasa;
		$est->save();

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
			$expl 		= explode('-', $cek_est->no_est);
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
				$nota[$c]->disc_part	 		= $r->discount_part;
				$nota[$c]->disc_jasa	 		= $r->discount_jasa;
				$nota[$c]->tanggal	 		= $r->tanggal_nota;
				$nota[$c]->save();
			}
		}
		EstJasa::where('no_est','NOT-A')->update(['no_est' => $noest]);		
		EstPart::where('no_est','NOT-A')->update(['no_est' => $noest]);		
		
		Nota::where('no_not','NOT-A')->delete();
		return redirect()->back()->with('success','Berhasil tambah Biaya Estimasi');
	}
}
