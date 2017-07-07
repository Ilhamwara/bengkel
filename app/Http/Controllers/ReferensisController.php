<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Jasa;
use\App\Sparepart;
use Validator;

class ReferensisController extends Controller
{
    public function index_jasa()
	{
		$jasas = Jasa::all();
		return view ('referensi.jasa', compact('jasas'));

	}
	public function tambah_jasa()
	{
		$jasas  = jasa::all();
		return view('referensi.tambah-jasa');
	}

	public function post_jasa(Request $request)
	{
		$jasa = new Jasa;
		$jasa->nama_jasa        = $request->nama_jasa;
		$jasa->harga_perfr        = $request->harga_perfr;
		$validator = Validator::make($request->all(), [
			'nama_jasa'          => 'required',
			'harga_perfr'        => 'required',
			]);

		if ($validator->fails()) {
			return redirect('jasa/tambah-jasa')
			->withErrors($validator)
			->withInput();
		}

		$jasa->save();
		return redirect()->back()->with('success','Berhasil tambah');
	}

	public function edit_jasa($id)
	{
		$jasa = Jasa::where('jasa.id', $id)
		->first();
		return view ('referensi.edit-jasa' , compact('jasa')); 
	}


	public function editpost_jasa(Request $request, $id)
	{

		$jasa = Jasa::where('jasa.id', $id)->first();
		$jasa->update($request->all());
		return redirect()->back()->with('success','Berhasil tambah');
	}

	public function hapus_jasa($id)
	{
		$jasa = Jasa::where('jasa.id', $id)->first();
		$jasa->delete();
		return redirect('/jasa');
	}
//SPAREPART
	 public function index_sparepart()
	{
		$spareparts = Sparepart::all();
		return view ('referensi.spare-part', compact('spareparts'));

	}
	public function tambah_sparepart()
	{
		$spareparts  = Sparepart::all();
		return view('referensi.tambah-sparepart');
	}

	public function post_sparepart(Request $request)
	{
		$sparepart = new Sparepart;
		$sparepart->no       	= $request->no;
		$sparepart->nama       	= $request->nama;
		$sparepart->stok        = $request->stok;
		$sparepart->harga_beli  = $request->harga_beli;
		$sparepart->harga_jual  = $request->harga_jual;
		$validator = Validator::make($request->all(), [
			'no'        => 'required',
			'nama'        => 'required',
			'stok'        => 'required',
			'harga_beli'  => 'required',
			'harga_jual'  => 'required',
			]);

		if ($validator->fails()) {
			return redirect('sparepart/tambah-sparepart')
			->withErrors($validator)
			->withInput();
		}

		$sparepart->save();
		return redirect()->back()->with('success','Berhasil tambah');
	}

	public function edit_sparepart($id)
	{
		$sparepart = Sparepart::where('spare_parts.id', $id)
		->first();
		return view ('referensi.edit-sparepart' , compact('sparepart')); 
	}


	public function editpost_sparepart(Request $request, $id)
	{

		$sparepart = Sparepart::where('spare_parts.id', $id)->first();
		$sparepart->update($request->all());
		return redirect()->back()->with('success','Berhasil tambah');
	}

	public function hapus_sparepart($id)
	{
		$sparepart = Sparepart::where('spare_parts.id', $id)->first();
		$sparepart->delete();
		return redirect('/sparepart');
	}
}
