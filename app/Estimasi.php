<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimasi extends Model
{
	protected $table = 'estimasi_biaya';
    protected $fillable = [
        'no_est',
        'est_part_id',
        'est_jasa_id',
        'wo_id',
    ];
}
