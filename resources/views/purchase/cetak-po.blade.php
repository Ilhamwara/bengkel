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
         <form action="{{url('purchase-order/cetak-po/' .$cetak->id)}}" method="GET" class="form-horizontal">
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
            <br><br>
            <table class="table table-striped table-condensed">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Part Number</th>
                    <th class="text-center">Part Name</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">ORY</th>
                    <th class="text-center">Thailand</th>
                    <th class="text-center">Jepang</th>
                </tr>
                @foreach($po_part as $k => $data)
                <tr>
                    <td class="text-center">{{$k+1}}</td>
                    <td class="text-center">{{$data->part_number}}</td>
                    <td class="text-center">{{$data->part_name}}</td>
                    <td class="text-center">{{$data->qty}}</td>
                    <td class="text-center">{{$data->ory}}</td>
                    <td class="text-center">{{$data->thailand}}</td>
                    <td class="text-center">{{$data->jepang}}</td>
                </tr>
                @endforeach
            </table>
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