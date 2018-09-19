<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
	protected $fillable=[
	'no_penj',
	'no_nota',
	'tgl_nota', 
	'no_bkb', 
	'no_pol', 
	'kode',
	'nama',
	'alamat',
	'kota',	   
	];
}
