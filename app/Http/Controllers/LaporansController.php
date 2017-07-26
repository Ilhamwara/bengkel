<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Workorder;
use App\Nota;

class LaporansController extends Controller
{
    public function index(){

    	$laporans = Workorder::all();
    	return view ('laporan.laporan', compact('laporans'));
    }
}
