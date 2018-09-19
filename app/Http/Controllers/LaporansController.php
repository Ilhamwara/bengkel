<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Workorder;
use App\Nota;

class LaporansController extends Controller
{
    public function index(){

    	$laporans = Nota::
		where('wo_id', '>', 0)
		// ->join('work_order','estimasi_biaya.wo_id','=','work_order.id')
		// ->join('pelanggans','work_order.pelanggan_id','=','pelanggans.id')
		->select('nota.id','nota.wo_id as nomor_wo','nota.keterangan','nota.updated_at', 'nota.no_not', 'nota.status', 'nota.grand_total', 'nota.tanggal')
		->groupBy('nota.no_not')
		->get();

    	return view ('laporan.laporan', compact('laporans'));
    }
}
