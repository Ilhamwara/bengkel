@extends('layouts.master')
@section('css')
<link href="{{asset('recources/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('recources/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />       
<style>
    input{

    }
</style>
@endsection
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Detail Order </span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"><b>Detail Order</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            
            <form action="{{url('work-order/cetak-wo/' .$order->id) }}" method="GET" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                <label class="col-sm-2 control-label text-left">No WO</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama" name="no_wo" value="{{$order->no_wo}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nid" name="nama" value="{{$order->nama_pelanggan}}" disabled >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Alamat</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="jabatan" name="Alamat" value="{{$order->alamat}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Nopol</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="no_pol" name="grade" value="{{$order->no_pol}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Telepon</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="telepon" name="telepon" value="{{$order->telepon}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Tipe</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="tipe" name="tipe" value="{{$order->tipe}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Noka/ Nosin</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="noka_nosin" name="noka_nosin" value="{{$order->noka_nosin}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Warna</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="noka_nosin" name="warna" value="{{$order->warna}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Keluhan</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="keluhan" value="{{$order->keluhan}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button class="btn btn-primary" type="submit">Cetak</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>

@endsection
