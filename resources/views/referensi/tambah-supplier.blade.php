
@extends('layouts.master')
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Tambah Supplier</span>
            </li>
        </ul>
    </div>

<h3 class="page-title"><b>Tambah Supplier</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
        @include('include.alert')
            <form action="{{url('post-supplier')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                 <div class="form-group">
                   <label class="col-sm-2 control-label text-left">ID</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="id_supplier" placeholder="ID" required> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Alamat</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">No Rekening</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="no_rek" placeholder="No Rekening" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">HP/ Email/ BBM</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="kontak" placeholder="HP/ Email/ BBM" required>
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

@endsection
