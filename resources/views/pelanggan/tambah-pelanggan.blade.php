
@extends('layouts.master')
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Tambah Pelanggan</span>
            </li>
        </ul>
    </div>

    <h3 class="page-title"><b>Tambah Pelanggan</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('post-pelanggan')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                 <label class="col-sm-2 control-label text-left">Id Pelanggan</label>
                 <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_pelanggan" placeholder="Id Pelanggan" required> 
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-left">Nama Pelanggan</label>
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
                <label class="col-sm-2 control-label text-left">Nopol</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_pol" placeholder="Nopol" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-left">Telepon</label>
                <div class="col-sm-6">
                    <input type="text" maxlength='15' onblur="checkNum($(this))" class="form-control" name="telepon" placeholder="Telepon" required>
                </div>
            </div>
            <div class="form-group">
               <label class="col-sm-2 control-label text-left">Tipe</label>
               <div class="col-sm-6">
                <input type="text" class="form-control" name="tipe" placeholder="Tipe" required>
            </div>
        </div>
        <div class="form-group">
         <label class="col-sm-2 control-label text-left">Noka/Nosin</label>
         <div class="col-sm-6">
            <input type="text" class="form-control" name="noka_nosin" placeholder="Noka/ Nosin" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label text-left">Warna</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="warna" placeholder="Warna" required>
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
@section('js')
<script>
    function checkNum(obj) {
        v = obj.val();
        if (!$.isNumeric(v)) {
            alert('Anda harus memasukan angka');
            obj.val('0');
            return false;
        }
    }
</script>
@endsection
