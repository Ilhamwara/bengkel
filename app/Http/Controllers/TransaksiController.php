<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi.index');
    }
    public function input()
    {
        return view('transaksi.input-transaksi');
    }
    public function confirm()
    {
        return view('transaksi.confirm-transaksi');
    }
    public function verifikasi()
    {
        return view('transaksi.verifikasi-transaksi');
    }
}
