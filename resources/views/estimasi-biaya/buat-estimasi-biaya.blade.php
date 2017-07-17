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
    @include('include.alert')
    <form action="{{url('post-estimasi')}}" method="POST" enctype="multipart/form-data" class="form-horizontal" style="overflow: hidden;">
      {{ csrf_field() }}
      <input type="hidden" name="estid" value="{{$cek_est->id}}">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-sm-3 control-label">Pilih WO</label>
            <div class="col-sm-8">
             <select name="order_id" class="select2 form-control" id ="select2" required>
               <option value="">-- Pilih WO --</option>
               @foreach($workorder as $data)
               <option value="{{$data->id}}" data-nama="{{$data->nama}}" data-alamat="{{$data->alamat}}" data-nopol="{{$data->no_pol}}" data-telepon="{{$data->telepon}}" data-tipe="{{$data->tipe}}" data-nokanosin="{{$data->noka_nosin}}" data-warna="{{$data->warna}}" data-km="{{$data->km_datang}}" data-fuel="{{$data->fuel_datang}}" data-tanggal="{{$data->tanggal}}">{{$data->no_wo}}</option>
               @endforeach
             </select>
           </div>
         </div>

         <div class="form-group">
          <label class="col-sm-3 control-label">Nama</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" min="0" name="nama" id="data_nama" disabled> 
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Alamat</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="alamat" id="data_alamat" disabled> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">No. Pol</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="no_pol" id="data_nopol" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Telepon</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="telepon" id="data_telepon" disabled>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Tanggal</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="tanggal" id="data_tanggal" disabled>
          </div>
        </div>

      </div>

      <div class="col-sm-6">

        <div class="form-group">
          <label class="col-sm-3 control-label">Type</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="tipe" id="data_tipe" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Noka/ Nosin</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="noka_nosin" id="data_nokanosin" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Warna</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="warna" id="data_warna" disabled>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Km Datang</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="km_datang" id="data_km" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Fuel Datang</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="fuel_datang" id="data_fuel" disabled>
          </div>
        </div>
      </div>
    </div>
    

    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <h4><b>Data Sparepart</b></h4>
        <div class="portlet light bordered">
         <div class="portlet-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
              <tr>
                <th class="text-center">Nama</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center"></th>
              </tr>
              @forelse($est_part as $part)
              <input type="hidden" name="est_part[]" value="{{$part->id}}">
              <tr>
                <td class="text-center">{{$part->nama}}</td>
                <td class="text-center">{{$part->qty}}</td>
                <td class="text-center">{{$part->harga_jual}}</td>
                <td class="text-center">{{$part->jumlah}}</td>
                <td class="text-center"><a href="{{url('estimasi-biaya/hapus-part/'.$part->id)}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
              </tr>
              @empty
              <tr>
                <td colspan="5" class="text-center bg-danger"><b>Kosong</b></td>
              </tr>
              @endforelse
              <tr>
               <td class="text-center" colspan="3"><b>Total</b></td>
               <td class="text-center">Rp {{$est_part->sum('jumlah')}}</td>
               <td></td>
             </tr>
           </table>
         </div>
         <a href="{{url('estimasi-biaya/pilih-sparepart/'.$cek_est->no_est)}}" class="btn btn-primary">Tambah</a>
       </div>
     </div>
   </div>
 </div>

 <div class="row">
  <div class="col-sm-10 col-sm-offset-1">
   <h4><b>Data Jasa</b></h4>
   <div class="portlet light bordered">

     <div class="portlet-body">
      <table class="table table-striped table-bordered table-hover">
        <tr>
          <th class="text-center">Nama Jasa</th>
          <th class="text-center">FR</th>
          <th class="text-center">Harga Per FR</th>
          <th class="text-center">Jumlah</th>
          <th class="text-center"></th>
        </tr>
        @forelse($est_jasa as $jasa)
        <tr>
          <input type="hidden" name="est_jasa[]" value="{{$jasa->id}}">
          <td class="text-center">{{$jasa->nama_jasa}}</td>
          <td class="text-center">{{$jasa->qty}}</td>
          <td class="text-center">{{$jasa->harga_perfr}}</td>
          <td class="text-center">{{$jasa->jumlah}}</td>
          <td class="text-center"><a href="{{url('estimasi-biaya/hapus-jasa/'.$jasa->id)}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
        </tr>
        @empty
        <tr>
          <td class="text-center bg-danger" colspan="5"><b>Kosong</b></td>
        </tr>
        @endforelse
        <tr>
         <td class="text-center" colspan="3"><b>Total</b></td>
         <td class="text-center">Rp {{$est_jasa->sum('jumlah')}}</td>
         <td></td>
       </tr>
     </table>
     <a href="{{url('estimasi-biaya/pilih-jasa/'.$cek_est->no_est)}}" class="btn btn-primary">Tambah</a>
   </div>
 </div>
</div>
</div>
<div class="row">
  <div class="col-sm-10 col-sm-offset-1">
    <h4><b>Keterangan</b></h4>
    <textarea class="form-control" id="deskripsi" name="keterangan" id="" cols="30" rows="10"></textarea>
  </div>
</div>
<br><br>
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
<script src="{{asset('js/ckeditor.js')}}"></script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
  CKEDITOR.replace( 'deskripsi',
  {
    customConfig : '',
    toolbar : 'simple'
  })
</script>
<script>
  $('#select2').change(function(){
    var
    value     = $(this).val(),
    $obj      = $('#select2 option[value="'+value+'"]'),
    nama      = $obj.attr('data-nama'),
    alamat    = $obj.attr('data-alamat'),
    nopol     = $obj.attr('data-nopol'),
    telepon   = $obj.attr('data-telepon'),
    tipe      = $obj.attr('data-tipe'),
    nokanosin = $obj.attr('data-nokanosin')
    warna     = $obj.attr('data-warna'),
    km        = $obj.attr('data-km'),
    fuel      = $obj.attr('data-fuel'),
    tanggal   = $obj.attr('data-tanggal');


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
