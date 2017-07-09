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
                <span>Detail Purchase Order</span>
            </li>
        </ul>
    </div>

    <h3 class="page-title"><b>Detail Purchase Order</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('cetak-purchase-order')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="col-sm-2 control-label">Supplier</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{$cetak->supplier}}" disabled> 
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="alamat" value="{{$cetak->alamat}}" disabled> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">No. PO</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="no_po" value="{{$cetak->no_po}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="tanggal" value="{{$cetak->tanggal}}" disabled>
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="tanggal" value="{{$cetak->status}}" disabled>
                    </div>
                </div>

               <input type="hidden" value="{{ 'csrf_token' }}" name="token">
               <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Cetak</button>
              </div>
          </div>
      </form>

  </div>

</div>
</div>
@endsection