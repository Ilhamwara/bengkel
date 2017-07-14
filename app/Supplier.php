<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	protected $table = 'supplier';
	protected $fillable=[
    	'id_supplier',
    	'nama', 
    	'alamat', 
    	'no_rek', 
    	'kontak',	   
	];
}
