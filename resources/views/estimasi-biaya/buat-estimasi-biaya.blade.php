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
        <span>Buat Estimasi Biaya</span>
      </li>
    </ul>
  </div>

  <h3 class="page-title"><b>Buat Estimasi Biaya</b></h3>
  <br>
  <div class="row">
    <form action="{{url('post-estimasi')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
      {{ csrf_field() }}
      <div class="col-sm-6">
        <div class="form-group">
          <label class="col-sm-2 control-label">Pilih WO</label>
          <div class="col-sm-6">
           <select name="workorder" class="form-control" id ="select2">
             <option value=""></option>
             @foreach($workorder as $data)
             <option value="{{$data->pelanggan_id}}" data-nama="{{$data->nama}}" data-alamat="{{$data->alamat}}" data-nopol="{{$data->no_pol}}" data-telepon="{{$data->telepon}}" data-tipe="{{$data->tipe}}" data-nokanosin="{{$data->noka_nosin}}" data-warna="{{$data->warna}}" data-km="{{$data->km_datang}}" data-fuel="{{$data->fuel_datang}}" data-tanggal="{{$data->tanggal}}">{{$data->no_wo}}</option>
             @endforeach
           </select>
         </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" min="0" name="nama" id="data_nama" disabled> 
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Alamat</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="alamat" id="data_alamat" disabled> 
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">No. Pol</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="no_pol" id="data_nopol" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Telepon</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="telepon" id="data_telepon" disabled>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Tanggal</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="tanggal" id="data_tanggal" disabled>
        </div>
      </div>

    </div>

    <div class="col-sm-6">

      <div class="form-group">
        <label class="col-sm-2 control-label">Type</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="tipe" id="data_tipe" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Noka/ Nosin</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="noka_nosin" id="data_nokanosin" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Warna</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="warna" id="data_warna" disabled>
        </div>
      </div>


      <div class="form-group">
        <label class="col-sm-2 control-label">Km Datang</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="km_datang" id="data_km" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Fuel Datang</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="fuel_datang" id="data_fuel" disabled>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h4>Form Sparepart</h4>
        <div class="portlet light bordered">
         <div class="portlet-body">
          <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Part</th>
                <th class="text-center">No Part</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Harga Satuan</th>
                <th class="text-center">Jumlah</th>
              </tr>
            </thead>
            <?php $i = 0 ?>
            <tbody>
              @forelse($estimasi as $sparepart)
              <?php $i++ ?>
              <tr>
                <td class="text-center">{{$i}}</td>
                <td class="text-center">{{$sparepart->nama_sparepart}}</td>
                <td class="text-center">{{$sparepart->nomor_sparepart}}</td>
                <td class="text-center">{{$sparepart->quantity_sparepart}}</td>
                <td class="text-center">{{$sparepart->harga_sparepart}}</td>
                <td class="text-center">{{$sparepart->total_harga_sparepart}}</td>
              </tr>
              @empty
              Data Kosong
              @endforelse
            </tbody>
          </table>
          <a href="{{url('estimasi-biaya/pilih-sparepart')}}">Tambah</a>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
     <h4>Form Jasa</h4>
     <div class="portlet light bordered">

       <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Jasa</th>
              <th class="text-center">Fr</th>
              <th class="text-center">Harga per FR</th>
              <th class="text-center">Jumlah</th>
            </tr>
          </thead>
          <?php $i = 0 ?>
            <tbody>
              @forelse($estimasi as $jasa)
              <?php $i++ ?>
              <tr>
                <td class="text-center">{{$i}}</td>
                <td class="text-center">{{$jasa->nama_jasa}}</td>
                <td class="text-center">{{$jasa->fr}}</td>
                <td class="text-center">{{$jasa->harga_perfr}}</td>
                <td class="text-center">{{$jasa->total_harga_jasa}}</td>
              </tr>
              @empty
              Data Kosong
              @endforelse
        </table>
        <a href="{{url('estimasi-biaya/pilih-jasa')}}">Tambah</a>
      </div>
    </div>
  </div>
</div>

<input type="hidden" value="{{ 'csrf_token' }}" name="token">
<div class="form-group">
  <div class="col-sm-offset-1 col-sm-10">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</div>
</form>

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
<script>$('#select2').change(function(){
  var
  value = $(this).val(),
  $obj = $('#select2 option[value="'+value+'"]'),
  nama = $obj.attr('data-nama'),
  alamat = $obj.attr('data-alamat'),
  nopol = $obj.attr('data-nopol'),
  telepon = $obj.attr('data-telepon'),
  tipe = $obj.attr('data-tipe'),
  nokanosin = $obj.attr('data-nokanosin')
  warna = $obj.attr('data-warna'),
  km = $obj.attr('data-km'),
  fuel = $obj.attr('data-fuel'),
  tanggal = $obj.attr('data-tanggal');


  $('#data_nama').val(nama);
  $('#data_alamat').val(alamat);
  $('#data_nopol').val(nopol);
  $('#data_telepon').val(telepon);
  $('#data_tipe').val(tipe);
  $('#data_nokanosin').val(nokanosin);
  $('#data_warna').val(warna);
  $('#data_km').val(km);
  $('#data_fuel').val(fuel);
  $('#data_tanggal').val(tanggal);

});
</script>
@endsection
