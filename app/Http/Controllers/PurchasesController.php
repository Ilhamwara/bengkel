<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Purchase;
use App\Supplier;
use App\PoPart;
use Validator;
use PDF;

class PurchasesController extends Controller
{

	public function index (){
		$purchases = Purchase::all();

		return view ('purchase.purchase-order', compact('purchases'));
	}

	public function buat_purchase_order(){
		$purchases = Purchase::all();
		$supp = Supplier::all();

		return view ('purchase.buat-po',compact('supp'));
	}

	public function post_purchase_order(Request $r){

		$purchase = new Purchase;
		$purchase->supplier    = $r->supplier;
		$purchase->alamat      = $r->alamat;
		$purchase->no_po       = $r->no_po;
		$purchase->tanggal     = date('Y-m-d');
		$purchase->status      = $r->status;

		if (Purchase::where('no_po',$r->no_po)->count() > 0) {
			return redirect()->back()->with('warning','Maaf Nomor Purchase Order yang anda masukan sudah ada');
		}

		$purchase->save();
		$cek_pur = Purchase::orderBy('id','DESC')->first();

		foreach ($r->number as $k => $v) {

			$po_part[$k] = new PoPart;
			$po_part[$k]->id_sup 		= $cek_pur->id;
			$po_part[$k]->part_number 	= $v;
			$po_part[$k]->part_name 	= $r->nama[$k];
			$po_part[$k]->qty 			= $r->qty[$k];
			$po_part[$k]->ory 			= $r->ory[$k];
			$po_part[$k]->thailand 		= $r->thailand[$k];
			$po_part[$k]->jepang 		= $r->jepang[$k];
			$po_part[$k]->save();
		}

		return redirect()->back()->with('success','Berhasil tambah Purchase Order');
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
		$po_part = PoPart::where('id_sup',$id)->get();

		return view ('purchase.cetak-po', compact('cetak','po_part'));
	}

	public function hapus_purchase_order($id)
	{
		Purchase::findOrFail($id)->delete();
		return redirect()->back()->with('success','Berhasil hapus purchase order');
	}

	public function cetak_PO($id, Request $request)
    {
    	$cetak = Purchase::where('form_po.id', $id)->first();
		$po_part = PoPart::where('id_sup',$id)->get();
        // dd(Hashids::connection('spd')->decode($id));
        // $wo = Workorder::findOrFail(Hashids::connection('workorder')->decode($id)[0]);
        $pdf = PDF::loadView('print.workorder', compact('cetak', 'po_part'));
        return @$pdf->stream('PURCHASE-ORDER-'.'pdf');
        // return view('print.spd', compact('spd'));
    }
}
