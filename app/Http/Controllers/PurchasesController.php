<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Purchase;
use Validator;

class PurchasesController extends Controller
{

	public function index (){
		$purchases = Purchase::all();

		return view ('purchase.purchase-order', compact('purchases'));
	}

	public function buat_purchase_order(){
		$purchases = Purchase::all();

		return view ('purchase.buat-po');
	}

	public function post_purchase_order(Request $request){
		$purchase = new Purchase;
		$purchase->supplier    = $request->supplier;
		$purchase->alamat      = $request->alamat;
		$purchase->no_po       = $request->no_po;
		$purchase->tanggal     = $request->tanggal;
		$purchase->status      = $request->status;
		$validator = Validator::make($request->all(), [
			'supplier'     => 'required',
			'alamat'       => 'required',
			'no_po'        => 'required',
			'tanggal'      => 'required',
			'status'       => 'required',
			]);

		if ($validator->fails()) {
			return redirect('buat-purchase-order')
			->withErrors($validator)
			->withInput();
		}

		$purchase->save();
		return redirect()->back()->with('success','Berhasil tambah');
	}

	public function edit_purchase_order($id){
		$purchase = Purchase::where('form_po.id', $id)->first();

		return view ('purchase.edit-po', compact('purchase'));
	}

	public function editpost_purchase_order(Request $request, $id)
	{

		$purchase = Purchase::where('form_po.id', $id)->first();
		$purchase->update($request->all());
		return redirect()->back()->with('success','Berhasil tambah');
	}

	public function detail_purchase_order($id){
		$cetak = Purchase::where('form_po.id', $id)->first();

		return view ('purchase.cetak-po', compact('cetak'));
	}

	public function hapus_purchase_order($id)
	{
		Purchase::findOrFail($id)->delete();
		return redirect()->back()->with('success','Berhasil edit data');
	}
}
