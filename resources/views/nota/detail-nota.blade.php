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
        <span>Detail Nota</span>
      </li>
    </ul>
  </div>

  @php 
  $a = $est_part->sum('jumlah') - $nota->disc_part;
  $b = $est_jasa->sum('jumlah') - $nota->disc_jasa; 

  @endphp

  <h3 class="page-title"><b>Detail Nota</b></h3>
  <br>
  <div class="row">
    @include('include.alert')
    <form action="{{url('nota/cetak-nota/'. $wo->no_wo)}}" method="GET" enctype="multipart/form-data" class="form-horizontal" style="overflow: hidden;">
      {{ csrf_field() }}
      <input type="hidden" name="estid" value="{{$est->id}}">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-sm-3 control-label">No WO</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" min="0" name="order_id" id="data_nama" value="{{$wo->no_wo}}" readonly> 
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" min="0" name="nama" id="data_nama" value="{{$wo->nama_pelanggan}}" disabled> 
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Alamat</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="alamat" id="data_alamat" value="{{$wo->alamat}}" disabled> 
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">No. Pol</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="no_pol" id="data_nopol" value="{{$wo->no_pol}}" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Telepon</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="telepon" id="data_telepon" value="{{$wo->telepon}}" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Tanggal</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="tanggal_nota" id="data_tanggal"  value="{{$nota->tanggal}}" readonly>
            </div>
          </div>

        </div>

        <div class="col-sm-6">

          <div class="form-group">
            <label class="col-sm-3 control-label">Type</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="tipe" id="data_tipe" value="{{$wo->tipe}}" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Noka/ Nosin</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="noka_nosin" id="data_nokanosin" value="{{$wo->noka_nosin}}" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Warna</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="warna" id="data_warna" value="{{$wo->warna}}" disabled>
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-3 control-label">Km Datang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="km_datang" id="data_km" value="{{$wo->km_datang}}" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Fuel Datang</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="fuel_datang" id="data_fuel" value="{{$wo->fuel_datang}}" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-sm-8">
               <input type="text" class="form-control" name="fuel_datang" id="data_fuel" value="{{$nota->status}}" disabled>
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
                <th class="text-center">Harga (Rp)</th>
                <th class="text-center">Jumlah (Rp)</th>

              </tr>
              @forelse($est_part as $part)
              <input type="hidden" name="est_part[]" value="{{$part->id}}">
              <tr>
                <td class="text-center">{{$part->nama}}</td>
                <td class="text-center">{{$part->qty}}</td>
                <td class="text-center">{{number_format($part->harga_jual)}}</td>
                <td class="text-center">{{number_format($part->jumlah)}}</td>

              </tr>
              @empty
              <tr>
                <td colspan="5" class="text-center bg-danger"><b>Kosong</b></td>
              </tr>
              @endforelse
              <tr>
               <td class="text-center" colspan="3"><b>Jumlah</b></td>
               <td class="text-center"><div class="input-group">
                 <span class="input-group-addon">Rp</span><input type="text" class="form-control" value="{{number_format($est_part->sum('jumlah'))}}" readonly  style="text-align: right;"></div></td>
                 
               </tr>
               <tr>
                 <td class="text-center" colspan="3"><b>Discount</b></td>
                 <td class="text-center"><div class="input-group">
                   <span class="input-group-addon" >Rp</span><input type="text" class="form-control" value="{{number_format($nota->disc_part)}}" readonly style="text-align: right;"></div></td>

                 </tr>

                 <tr>
                   <td class="text-center" colspan="3"><b>Total</b></td>
                   <td class="text-center"><div class="input-group">
                     <span class="input-group-addon" >Rp</span><input type="text" class="form-control" value="{{number_format($a)}}" readonly style="text-align: right;"></div></td>

                   </tr>
                 </table>

               </div>
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
                <th class="text-center">Harga Per FR (Rp)</th>
                <th class="text-center">Jumlah (Rp)</th>

              </tr>
              @forelse($est_jasa as $jasa)
              <tr>
                <input type="hidden" name="est_jasa[]" value="{{$jasa->id}}">
                <td class="text-center">{{$jasa->nama_jasa}}</td>
                <td class="text-center">{{$jasa->qty}}</td>
                <td class="text-center">{{number_format($jasa->harga_perfr)}}</td>
                <td class="text-center">{{number_format($jasa->jumlah)}}</td>

              </tr>
              @empty
              <tr>
                <td class="text-center bg-danger" colspan="5"><b>Kosong</b></td>
              </tr>
              @endforelse
              <tr>
                <td class="text-center" colspan="3"><b>Jumlah</b></td>
                <td class="text-center"><div class="input-group"><span class="input-group-addon">Rp</span><input type="text" class="form-control" value="{{number_format($est_jasa->sum('jumlah'))}}" readonly  style="text-align: right;"></div></td>

              </tr>
              <tr>
               <td class="text-center" colspan="3"><b>Discount</b></td>
               <td class="text-center"><div class="input-group"><span class="input-group-addon">Rp</span><input type="text" class="form-control" value="{{number_format($nota->disc_jasa)}}" readonly  style="text-align: right;"></div></td>

             </tr>
             <tr>
               <td class="text-center" colspan="3"><b>Total</b></td>
               <td class="text-center"><div class="input-group"><span class="input-group-addon">Rp</span><input type="text" class="form-control" value="{{number_format($b)}}" readonly  style="text-align: right;"></div></td>

             </tr>
           </table>
         </div>
       </div>
     </div>
   </div>

   <div class="row">
    <div class="col-sm-10 col-sm-offset-1">

     <div class="form-group">
      <label class="col-sm-3 control-label">DP</label>
      <div class="col-sm-8"><div class="input-group">
       <span class="input-group-addon">Rp</span>
       <input type="text" class="form-control" name="dp" id="data_fuel" value="{{number_format($nota->dp)}}" placeholder="DP" readonly></div>
     </div>
   </div>

   <div class="form-group">
    <label class="col-sm-3 control-label">Grand Total</label>
    <div class="col-sm-8">
    <div class="input-group"><span class="input-group-addon">Rp</span><input type="text" class="form-control" name="grand_total" id="sum2" readonly value="{{number_format($nota->grand_total)}}"></div>
    </div>
  </div>

</div>
</div>

<div class="row">
  <div class="col-sm-10 col-sm-offset-1">
    <h4><b>Keterangan</b></h4>
    <textarea class="form-control" id="deskripsi" name="keterangan" id="" cols="30" rows="10" readonly>{{$nota->keterangan}}</textarea>
  </div>
</div>
<br><br>
<div class="form-group">
  <div class="col-sm-offset-1 col-sm-10">
    <button type="submit" class="btn btn-primary">Cetak</button>
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
