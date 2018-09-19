<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    protected $table = 'spare_parts';
	protected $fillable=[
	'nama', 
	'stok', 
	'harga_beli', 
	'harga_jual',   
	];
}
