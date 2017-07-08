<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
     protected $table = 'vehicle_inspection';
	protected $fillable=[
	'sparepart', 
	'status',
	'type', 
	'foto1',
	'foto2', 
	'foto3',
	'foto4',
	'keterangan',    
	];

}
