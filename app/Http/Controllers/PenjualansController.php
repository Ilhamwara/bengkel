<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use\App\Penjualan;
use\App\Sparepart;
use\App\PenjPart;
use Validator;
USE PDF;

class PenjualansController extends Controller
{
    	public function index()
	{
		$penjualans = Penjualan::all();
		return view ('penjualan.penjualan', compact('penjualans'));

	}
	public function tambah_penjualan()
	{
		$penjualans  = Penjualan::all();
		$part  	     = Sparepart::all();

			Penjualan::updateOrCreate([
				'no_penj' => 'PENJ-1'
			]);

		$cek_penj = Penjualan::orderBy('id','DESC')->first();
		$penj_part = PenjPart::where('no_penj',$cek_penj->no_penj)->join('spare_parts','penj_part.part_id','=','spare_parts.id')->select('penj_part.*','spare_parts.nama','spare_parts.harga_jual', 'spare_parts.no')->get();

		return view('penjualan.tambah-penjualan', compact('penjualans', 'part', 'cek_penj', 'penj_part'));
	}

	public function post_penjualan(Request $request)
	{
	
		// $nopenj 		= 'PENJ-'.date('dmy').'-A';
		$cek = Penjualan::where('no_nota',$request->no_nota)->first();

		if (count($cek) > 0) {
			return redirect()->back()->with('warning','Maaf no nota yang anda masukan sudah ada silahkan coba lagi');
		}

		$cek_penj 	= Penjualan::orderBy('id','DESC')->first();
		// $expl 		= explode('-', $cek_penj->id);
		// $num		= $expl;
		$nopenj 	= 'PENJ-'.$cek_penj->id;

		$penjualan = new Penjualan;
		$penjualan->no_penj     = $nopenj;
		$penjualan->no_nota     = $request->no_nota;
		$penjualan->tgl_nota    = date('d-m-Y');
		$penjualan->no_bkb      = $request->no_bkb;
		$penjualan->no_pol      = $request->no_pol;
		$penjualan->kode        = $request->kode;
		$penjualan->nama        = $request->nama;
		$penjualan->alamat      = $request->alamat;
		$penjualan->kota    	= $request->kota;

		PenjPart::where('no_penj',$cek_penj->no_penj)->update(['no_penj' => $nopenj]);		

		$penjualan->save();
		$cek_penj->delete();

		return redirect('penjualan')->with('success','Berhasil menambahkan penjualan');
	}

	public function detail_penjualan($id)
	{
		$penjualan = Penjualan::findOrFail($id);

		$penj_part = PenjPart::where('penj_part.no_penj',$penjualan->no_penj)
		->join('penjualan', 'penj_part.no_penj','=','penjualan.no_penj')
		->join('spare_parts', 'penj_part.part_id', 'spare_parts.id')
		->select('penj_part.*', 'spare_parts.no as no_part', 'spare_parts.nama as nama_part', 'spare_parts.harga_jual')
		->get();

		// dd($penj_part);
		return view ('penjualan.detail_penjualan' , compact('penjualan', 'penj_part')); 
	}


	public function editpost_penjualan(Request $request, $id)
	{

		$penjualan = Penjualan::where('penjualan.id', $id)->first();
		$penjualan->update($request->all());
		return redirect('penjualan')->with('success','Berhasil edit penjualan');
	}

	public function hapus_penjualan($id)
	{
		$penjualan = Penjualan::findOrFail($id);
		$penj_part = PenjPart::where('no_penj',$penjualan->no_penj)->get();

		$penj_part->delete();
		$penjualan->delete();
		return redirect()->back()->with('success','Berhasil hapus data penjualan');
	}

	public function jual_sparepart($idpenj){

		$spareparts = Sparepart::all();
		return view ('penjualan.pilih-sparepart', compact('spareparts','idpenj'));

	}
		public function post_jual_sparepart (Request $r)
	{
		
		$penj = new PenjPart;
		$penj->part_id  	= $r->sparepart;
		$penj->no_penj    	= $r->idpenj;
		$penj->qty  		= $r->quantity_sparepart;
		$penj->jumlah 		= $r->total_harga_sparepart;

		// $part = Sparepart::where('id',$r->sparepart)->first();

		// if($r->quantity_sparepart > $part->stok) {
		// 	return redirect()->back()->with('warning','Maaf jumlah yang anda masukan tidak mencukupi dari stok barang');
		// }

		// $part->stok = ($part->stok - $r->quantity_sparepart);

		// $part->save();
		$penj->save();

		return redirect('penjualan/tambah-penjualan')->with('success','Berhasil menambahkan penjualan sparepart');
		
	}

	public function cetak_penjualan($id, Request $request)
    {
    	$penjualan = Penjualan::all();
        // dd(Hashids::connection('spd')->decode($id));
        // $wo = Workorder::findOrFail(Hashids::connection('workorder')->decode($id)[0]);
        $pdf = PDF::loadView('print.workorder', compact('penjualan'));
        return @$pdf->stream('PENJUALAN-SPAREPART-'.'pdf');
        // return view('print.spd', compact('spd'));
    }
}
