<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EstPart;
use App\EstJasa;
use App\Nota;
use App\Workorder;
use App\Estimasi;

class NotaController extends Controller
{
    public function buat_nota($id){
		$wo = Workorder::where('work_order.no_wo', $id)->join('pelanggans', 'work_order.pelanggan_id', 'pelanggans.id')
		->select('work_order.*','work_order.id', 'pelanggans.nama', 'pelanggans.alamat', 'pelanggans.no_pol', 'pelanggans.telepon', 'pelanggans.tipe', 'pelanggans.noka_nosin', 'pelanggans.warna')
		->first();
		// Dd($pelanggan);
$est = Estimasi::where('estimasi_biaya.wo_id', $id)->first();
		Nota::updateOrCreate([
			'no_not' => 'NOT-A'
			]);

		$cek_est = Estimasi::orderBy('id','DESC')->first();
		// dd($cek_est->no_est);

		$est_part = EstPart::where('no_est',$est->no_est)->join('spare_parts','est_part.part_id','=','spare_parts.id')->select('est_part.*','spare_parts.nama','spare_parts.harga_jual')->get();		
		$est_jasa = EstJasa::where('no_est',$est->no_est)->join('jasa','est_jasa.jasa_id','=','jasa.id')->select('est_jasa.*','jasa.nama_jasa','jasa.harga_perfr')->get();
		
		return view ('nota.buat-nota', compact('wo','cek_est','est_jasa','est_part'));

	}
}
