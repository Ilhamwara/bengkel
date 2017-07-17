
@extends('layouts.master')
@section('content')
<div class="page-content">
  <div class="page-bar">
    <ul class="page-breadcrumb">
      <li>
        <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
      </li>
      <li>
        <span>Tambah Penjualan Sparepart</span>
      </li>
    </ul>
  </div>

  <h3 class="page-title"><b>Tambah Penjualan Sparepart</b></h3>
  <br>
  <div class="row">
    <div class="col-md-12">
      <form action="{{url('post-penjualan')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
         <label class="col-sm-2 control-label text-left">No Nota</label>
         <div class="col-sm-6">
          <input type="text" class="form-control" name="no_nota" placeholder="No Nota" required> 
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label text-left">Tgl Nota</label>
        <div class="col-sm-6">
          <input type="date" class="form-control" name="tgl_nota" placeholder="Tgl Nota" required> 
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label text-left">No BKB</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="no_bkb" placeholder="No_BKB" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label text-left">No Pol</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="no_pol" placeholder="No Pol" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label text-left">Nama</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="nama" placeholder="Nama" required>
        </div>
      </div>
      <div class="form-group">
       <label class="col-sm-2 control-label text-left">Kode</label>
       <div class="col-sm-6">
        <input type="text" class="form-control" name="kode" placeholder="Kode" required>
      </div>
    </div>
    <div class="form-group">
     <label class="col-sm-2 control-label text-left">Alamat</label>
     <div class="col-sm-6">
      <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label text-left">Kota</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="kota" placeholder="kota" required>
    </div>
  </div>

  <div class="col-md-12">
    <div class="portlet light bordered">

      <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama Part</th>
              <th class="text-center">No Part</th>
              <th class="text-center">Qty</th>
              <th class="text-center">Harga Satuan</th>
              <th class="text-center">Jumlah</th>
            </tr>
          </thead>   
          <tbody>
            <?php $i=0; ?>
            @forelse($penj_part as $part)
            <?php $i++ ?>
            <tr>
              <td>{{$i}}</td>
              <td class="text-center">{{$part->nama}}</td>
              <td class="text-center">{{$part->no}}</td>
              <td class="text-center">{{$part->qty}}</td>
              <td class="text-center">{{$part->harga_jual}}</td>
              <td class="text-center">{{$part->jumlah}}</td>
              
            </tr>
            @empty
            kosong
            @endforelse
            <td colspan="5" class="text-center">Total</td>
            <td class="text-center">Rp {{$penj_part->sum('jumlah')}}</td>
          </tbody>
        </table>
        <a href="{{url('penjualan/jual-sparepart/'.$cek_penj->no_penj)}}" class="btn btn-primary">Tambah</a>     
      </div>
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
