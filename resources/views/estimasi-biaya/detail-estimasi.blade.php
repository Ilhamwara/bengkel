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
        <span>Detail Estimasi Biaya</span>
      </li>
    </ul>
  </div>

  <h3 class="page-title"><b>Detail Estimasi Biaya</b></h3>
  <br>
  <div class="row" style="overflow: hidden;">
    @include('include.alert')
    <form action="{{url('estimasi/cetak-estimasi/' .$estimasi->id)}}" method="GET" class="form-horizontal">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="col-sm-6">

         <div class="form-group">
          <label class="col-sm-3 control-label">Nama</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" min="0" name="nama" value="{{$estimasi->nama_pelanggan}}" readonly> 
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Alamat</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="alamat" value="{{$estimasi->alamat}}" readonly> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">No. Pol</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="no_pol" value="{{$estimasi->no_pol}}" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Telepon</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="telepon" value="{{$estimasi->telepon}}" readonly>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Tanggal</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="tanggal" value="{{$estimasi->tanggal}}" readonly>
          </div>
        </div>

      </div>

      <div class="col-sm-6">

        <div class="form-group">
          <label class="col-sm-3 control-label">Type</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="tipe" value="{{$estimasi->tipe}}" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Noka/ Nosin</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="noka_nosin" value="{{$estimasi->noka_nosin}}" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Warna</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="warna" value="{{$estimasi->warna}}" readonly>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Km Datang</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="km_datang" value="{{$estimasi->km_datang}}" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Fuel Datang</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="fuel_datang" value={{"$estimasi->fuel_datang"}} readonly>
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
              <th class="text-center">No</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Jumlah</th>

            </tr>

            @forelse($est_part as $v => $part)
            <tr>
              <td class="text-center">{{$v+1}}</td>
              <td class="text-center">{{$part->nama}}</td>
              <td class="text-center">{{$part->qty}}</td>
              <td class="text-center">{{$part->harga_jual}}</td>
              <td class="text-center">{{$part->jumlah}}</td>    
            </tr>
            @empty
            @endforelse
            <tr>
             <td class="text-center" colspan="4"><b>Total</b></td>
             <td class="text-center">Rp {{$est_part->sum('jumlah')}}</td>
           </tr>
         </table>
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
          <th class="text-center">No</th>
          <th class="text-center">Nama Jasa</th>
          <th class="text-center">FR</th>
          <th class="text-center">Harga Per FR</th>
          <th class="text-center">Jumlah</th>
        </tr>

        @forelse($est_jasa as $k => $jasa)
        <tr>
          <td class="text-center">{{$k+1}}</td>
          <td class="text-center">{{$jasa->nama_jasa}}</td>
          <td class="text-center">{{$jasa->qty}}</td>
          <td class="text-center">{{$jasa->harga_perfr}}</td>
          <td class="text-center">{{$jasa->jumlah}}</td> 
        </tr> 
        @empty
        @endforelse
        <tr>
         <td class="text-center" colspan="4"><b>Total</b></td>
         <td class="text-center">Rp {{$est_jasa->sum('jumlah')}}</td>
       </tr>

     </table>
   </div>
 </div>
</div>
</div>
<div class="row">
  <div class="col-sm-10 col-sm-offset-1">
    <h4><b>Keterangan</b></h4>
    <textarea class="form-control" id="deskripsi" name="keterangan" id="" cols="30" rows="10" readonly>{!!$est->keterangan!!}</textarea>
  </div>
</div>
<br><br>
<div class="form-group">
  <div class="col-sm-offset-1 col-sm-10">
    <button type="submit" class="btn btn-primary">Cetak</button>
  </div>
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


@endsection
