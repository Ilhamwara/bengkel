<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
     protected $table = 'jasa';
	protected $fillable=[
	'nama_jasa', 
	'harga_perfr',    
	];

}
