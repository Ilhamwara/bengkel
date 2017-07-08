<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimasi extends Model
{
	
		protected $table = 'estimasi_biaya';
		protected $fillable=[
		'order_id', 
		'sparepart_id',
		'jasa_id', 
		'quantity_sparepart',
		'total_harga_sparepart',
		'fr_jasa',
		'total_harga_jasa',    
		];


}
