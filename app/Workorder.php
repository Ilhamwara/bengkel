<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workorder extends Model
{
    protected $table = 'work_order';
    protected $fillable =[
    'pelanggan_id',
    'km_datang',
    'fuel_datang',
    'tanggal',
    'keluhan',

    ];
}
