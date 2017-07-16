<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use\App\Penjualan;
use\App\Sparepart;
use\App\Penjpart;
use Validator;

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
		$part  = Sparepart::all();

			Penjualan::updateOrCreate([
				'no_penj' => 'PENJ-'.date('dmy').'-A'
			]);

		$cek_penj = Penjualan::orderBy('id','DESC')->first();
		$penj_part = PenjPart::where('no_penj',$cek_penj->no_penj)->join('spare_parts','penj_part.part_id','=','spare_parts.id')->select('penj_part.*','spare_parts.nama','spare_parts.harga_jual', 'spare_parts.no')->get();

		return view('penjualan.tambah-penjualan', compact('penjualans', 'part', 'cek_penj', 'penj_part'));
	}

	public function post_penjualan(Request $request)
	{
	
		$nopenj 		= 'PENJ-'.date('dmy').'-A';
		$penjualan = new Penjualan;
		$penjualan->no_penj     = $request->nopenj;
		$penjualan->no_nota     = $request->no_nota;
		$penjualan->tgl_nota    = $request->tgl_nota;
		$penjualan->no_bkb      = $request->no_bkb;
		$penjualan->no_pol      = $request->no_pol;
		$penjualan->kode        = $request->kode;
		$penjualan->nama        = $request->nama;
		$penjualan->alamat      = $request->alamat;
		$penjualan->kota    	= $request->kota;
		$validator = Validator::make($request->all(), [
			'no_nota'       => 'required',
			'tgl_nota'      => 'required',
			'no_bkb'        => 'required',
			'no_pol'        => 'required',
			'kode'    		=> 'required',
			'nama'          => 'required',
			'alamat'        => 'required',
			'kota'    		=> 'required',
			]);

		if ($validator->fails()) {
			return redirect('penjualan/tambah-penjualan')
			->withErrors($validator)
			->withInput();
		}

		$penjualan->save();
		return redirect('penjualan');
	}

	public function detail_penjualan($id)
	{
		$penjualan = Penjualan::where('penjualan.id', $id)
		->first();
		return view ('penjualan.detail_penjualan' , compact('penjualan')); 
	}


	public function editpost_penjualan(Request $request, $id)
	{

		$penjualan = Penjualan::where('penjualan.id', $id)->first();
		$penjualan->update($request->all());
		return redirect('penjualan')->with('success','Berhasil edit penjualan');
	}

	public function hapus_penjualan($id)
	{
		$penjualan = Penjualan::where('penjualan.id', $id)->first();
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

		$part = Sparepart::where('id',$r->sparepart)->first();

		// if($r->quantity_sparepart > $part->stok) {
		// 	return redirect()->back()->with('warning','Maaf jumlah yang anda masukan tidak mencukupi dari stok barang');
		// }

		// $part->stok = ($part->stok - $r->quantity_sparepart);

		$part->save();
		$penj->save();

		return redirect('penjualan/tambah-penjualan')->with('success','Berhasil menambahkan penjualan sparepart');
		
	}
}
