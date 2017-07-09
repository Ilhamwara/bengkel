<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'form_po';
    protected $fillable =[
    'supplier',
    'alamat',
    'no_po',
    'alamat',
    'tanggal',
    'status',
    ];
}
