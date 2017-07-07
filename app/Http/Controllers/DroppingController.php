<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DroppingController extends Controller
{
    public function index()
    {
        return view('dropping.index');
    }
    public function tarik()
    {
        return view('dropping.tarik');
    }
    public function tambah()
    {
        return view('dropping.tambah');
    }
    public function pengembalian()
    {
        return view('dropping.pengembalian');
    }
}
