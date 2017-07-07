@extends('layouts.master')
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Pengembalian Dropping</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"><b>Pengembalian Dropping</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
           <form class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-2 control-label text-left"><b>Tanggal</b></label>
                <div class="col-sm-6">
                  <input type="date" class="form-control" placeholder="Tanggal">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left"><b>Jumlah</b></label>
                <div class="col-sm-6">
                  <input type="number" min="0" class="form-control" placeholder="Jumlah">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-left"><b>Akun Bank</b></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" placeholder="Akun Bank">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection