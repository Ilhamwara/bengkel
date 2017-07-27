<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimasi extends Model
{
	protected $table = 'estimasi_biaya';
    protected $fillable = [
        'no_est',
        'ref_id',
        'wo_id',
        'keterangan',
        'type',
        'tanggal',
    ];
}
