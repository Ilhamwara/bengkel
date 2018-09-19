<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
	protected $table = 'pelanggans';
	protected $fillable=[
	'id_pelanggan',
	'nama', 
	'alamat', 
	'no_pol', 
	'telepon',
	'tipe',
	'noka_nosin',
	'warna',	   
	];
}
