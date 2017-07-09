<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workorder extends Model
{
    protected $table = 'work_order';
    protected $fillable =[
    'pelanggan_id',
    'no_wo',
    'km_datang',
    'fuel_datang',
    'tanggal',

    ];
}
