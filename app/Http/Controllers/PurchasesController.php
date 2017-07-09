<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Purchase;

class PurchasesController extends Controller
{

	public function index (){
    	$purchases = Purchase::all();

    	return view ('purchase.index');
    }

    public function buat_purchase_order(){
    	$purchases = Purchase::all();

    	return view ('purchase.buat-po');
    }

    public function post_purchase_order(){
    	$purchases = Purchase::all();

    	return view ('purchase.buat-po');
    }
}
