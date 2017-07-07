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
                <span>Buat Order Work</span>
            </li>
        </ul>
    </div>

    <h3 class="page-title"><b>Buat Order Work</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('post-order')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="col-sm-2 control-label">Pilih Customer</label>
                    <div class="col-sm-6">
                        <select class="select2 form-control" name="pelanggan" multiple="multiple" style="width: 100%;">
                            @foreach($pelanggan as $data)
                            <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @foreach($pelanggan as $order)
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama_pelanggan" value="{{$order->nama}}" required> 
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="alamat" value="{{$order->alamat}}" required> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">No. Pol</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="no_pol" value="{{$order->no_pol}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Telepon</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="telepon" value="{{$order->telepon}}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="tipe" value="{{$order->tipe}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Noka/ Nosin</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="noka_nosin" value="{{$order->noka_nosin}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Warna</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="warna" value="{{$order->warna}}" required>
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Km Datang</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="km_datang" placeholder="Km Datang" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Fuel Datang</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="fuel_datang" placeholder="Fuel Datang" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Keluhan</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="keluhan" placeholder="Keluhan" required></textarea>
                    </div>
                </div>

                <input type="hidden" value="{{ 'csrf_token' }}" name="token">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <a href="{{url('#')}}" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Buat Keluhan</a>
                      <a href="{{url('#')}}" class="btn btn-info">Cetak</a>

                  </div>
              </div>
          </form>

      </div>

  </div>
</div>
@endsection
@section('js')
<script src="{{asset('recources/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
@endsection
