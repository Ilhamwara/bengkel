<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use Validator;


class PelanggansController extends Controller
{
	public function index()
	{
		$pelanggans = Pelanggan::all();
		return view ('pelanggan.pelanggan', compact('pelanggans'));

	}
	public function tambah_pelanggan()
	{
		$pelanggans  = Pelanggan::all();
		return view('pelanggan.tambah-pelanggan');
	}

	public function post_pelanggan(Request $request)
	{
		$pelanggan = new Pelanggan;
		$pelanggan->id_pelanggan        = $request->id_pelanggan;
		$pelanggan->nama        = $request->nama;
		$pelanggan->alamat      = $request->alamat;
		$pelanggan->no_pol      = $request->no_pol;
		$pelanggan->telepon     = $request->telepon;
		$pelanggan->tipe        = $request->tipe;
		$pelanggan->noka_nosin  = $request->noka_nosin;
		$pelanggan->warna    	= $request->warna;
		$validator = Validator::make($request->all(), [
			'nama'          => 'required',
			'alamat'        => 'required',
			'no_pol'        => 'required',
			'telepon'       => 'required',
			'tipe'    		=> 'required',
			'noka_nosin'    => 'required',
			'warna'    		=> 'required',
			]);

		if ($validator->fails()) {
			return redirect('pelanggan/tambah-pelanggan')
			->withErrors($validator)
			->withInput();
		}

		$pelanggan->save();
		return redirect()->back()->with('success','Berhasil tambah pelanggan');
	}

	public function edit_pelanggan($id)
	{
		$pelanggan = Pelanggan::where('pelanggans.id', $id)
		->first();
		return view ('pelanggan.edit_pelanggan' , compact('pelanggan')); 
	}


	public function editpost_pelanggan(Request $request, $id)
	{

		$pelanggan = Pelanggan::where('pelanggans.id', $id)->first();
		$pelanggan->update($request->all());
		return redirect('pelanggan')->with('success','Berhasil edit pelanggan');
	}

	public function hapus_pelanggan($id)
	{
		$pelanggan = Pelanggan::where('pelanggans.id', $id)->first();
		$pelanggan->delete();
		return redirect()->back()->with('success','Berhasil hapus data pelanggan');
	}

}



