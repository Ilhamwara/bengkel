<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
	protected $table = 'nota';
    protected $fillable = [
        'no_not',
        'ref_id',
        'wo_id',
        'keterangan',
        'type',
        'disc_part',
        'disc_jasa',
        'dp',
        'tanggal',
        'status',
        'grand_total',

    ];
}
