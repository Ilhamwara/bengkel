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
                <span>Edit Purchase Order</span>
            </li>
        </ul>
    </div>

    <h3 class="page-title"><b>Edit Purchase Order</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('editpost/purchase-order/'. $purchase->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="col-sm-2 control-label">Supplier</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="supplier" value="{{$purchase->supplier}}"> 
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="alamat" value="{{$purchase->alamat}}"> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">No. PO</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="no_po" value="{{$purchase->no_po}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="tanggal" value="{{$purchase->tanggal}}">
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-6">
                    <select name="status" class="form-control" id ="select2">
                           <option value="reguler">Reguler</option>
                           <option value="emergency">Emergency</option>
                       </select>
                   </div>
               </div>

               <input type="hidden" value="{{ 'csrf_token' }}" name="token">
               <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </div>
      </form>

  </div>

</div>
</div>
@endsection