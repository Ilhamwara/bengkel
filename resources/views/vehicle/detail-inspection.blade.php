@extends('layouts.master')
@section('css')
<link href="{{asset('recources/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('recources/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Detail Vehicle Inspection</span>
            </li>
        </ul>
    </div>

    <h3 class="page-title"><b>Detail Vehicle Inspection</b></h3>
    <br>
    <div class="row">
       <form action="{{url('vehicle-inspection/cetak-inspection/' .$inspect->id)}}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        @include('include.alert')
        <div class="col-sm-12" style="margin-bottom: 10px;">
            <div class="col-sm-6">

               <div class="form-group">
                <label class="col-sm-4 text-left">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" min="0" name="nama" value="{{$inspect->nama_pelanggan}}" readonly> 
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 text-left">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="alamat" value="{{$inspect->alamat}}" readonly> 
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 text-left">No. Pol</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_pol" value="{{$inspect->no_pol}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 text-left">Telepon</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="telepon" value="{{$inspect->telepon}}" readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 text-left">Tanggal</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tgl" value="{{$inspect->tgl}}" readonly>
                </div>
            </div>

        </div>

        <div class="col-sm-6">

            <div class="form-group">
                <label class="col-sm-4 text-left">Type</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tipe" value="{{$inspect->no_pol}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 text-left">Noka/ Nosin</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="noka_nosin" value="{{$inspect->noka_nosin}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 text-left">Warna</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="warna" value="{{$inspect->warna}}" readonly>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-4 text-left">Km Datang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="km_datang" value="{{$inspect->km_datang}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 text-left">Fuel Datang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="fuel_datang" value="{{$inspect->fuel_datang}}" readonly>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <br><br>
        <div class="table-responsive">
         <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">

            {{--@if($vecdok[0]->type == 'Dokumen Kendaraan')
            <tr>
                <th class="bg-primary" colspan="4">Dokumen Kendaraan</th>
            </tr>
            @endif
            @foreach($vecdok as $a => $dok)
            <tr>
                <td class=""><b>{{$a+1}}</b></td>
                <td class="">{{$dok->nama}}</td>
                <td>
                    <div class="text-center">
                        <input type="checkbox" name="tipe[]" value="{{$dok->id}}" class="form-control">
                    </div>
                </td>
            </tr>
            @endforeach

            @if($vecdalam[0]->type == 'Fungsi Aksesoris Bagian Dalam')
            <tr>
                <th class="bg-primary" colspan="4">Fungsi Aksesoris Bagian Dalam</th>
            </tr>
            @endif
            @foreach($vecdalam as $b => $dal)
            <tr>
                <td class=""><b>{{$b+1}}</b></td>
                <td class="">{{$dal->nama}}</td>
                <td>
                    <div class="text-center">
                        <input type="checkbox" name="tipe[]" value="{{$dal->id}}" class="form-control">
                    </div>
                </td>
            </tr>
            @endforeach

            @if($vecluar[0]->type == 'Fungsi Aksesoris Bagian Luar')
            <tr>
                <th class="bg-primary" colspan="4">Fungsi Aksesoris Bagian Luar</th>
            </tr>
            @endif
            @foreach($vecluar as $c => $luar)
            <tr>
                <td class=""><b>{{$c+1}}</b></td>
                <td class="">{{$luar->nama}}</td>
                <td>
                    <div class="text-center">
                        <input type="checkbox" name="tipe[]" value="{{$luar->id}}" class="form-control">
                    </div>
                </td>
            </tr>
            @endforeach

            @if($vecperl[0]->type == 'Perlengkapan Kendaraan')
            <tr>
                <th class="bg-primary" colspan="4">Perlengkapan Kendaraan</th>
            </tr>
            @endif
            @foreach($vecperl as $d => $perl)
            <tr>
                <td class=""><b>{{$d+1}}</b></td>
                <td class="">{{$perl->nama}}</td>
                <td>
                    <div class="text-center">
                        <input type="checkbox" name="tipe[]" value="{{$perl->id}}" class="form-control">
                    </div>
                </td>
            </tr>
            @endforeach--}}

        </table>
    </div>
</div>

<div class="col-sm-offset-1 col-sm-10">
    <h4><b>Kondisi Body Luar Kendaraan</b></h4>
    <br>

    <div class="form-group">
        <label><b>Keterangan</b></label> 
        <textarea class="form-control" name="keterangan"></textarea>  
    </div>     
</div>
<div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
      <button class="btn btn-primary">Cetak</button>
  </div>
</div>
</form>

</div>
</div>
@endsection
@section('js')
<script src="{{asset('recources/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/ckeditor.js')}}"></script>

@endsection
