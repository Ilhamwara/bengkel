
@extends('layouts.master')
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Tambah Sparepart</span>
            </li>
        </ul>
    </div>

    <h3 class="page-title"><b>Tambah Sparepart</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('post-sparepart')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-2 control-label">No Part</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="no" placeholder="No Part" required> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Part</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Part" required> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Harga Beli</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="harga_beli" placeholder="Harga Beli" required> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Harga Jual</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="harga_jual" placeholder="Harga Jual" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Stok</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="stok" placeholder="Stok" required>
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
