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

    <form action="{{url('post-estimasi')}}" method="POST" enctype="multipart/form-data" class="form-horizontal" style="overflow: hidden;">
      {{ csrf_field() }}
        <div class="col-sm-10 col-sm-offset-1">
      <div class="col-sm-6">
        <div class="form-group">
          <label class="col-sm-3 control-label">Pilih WO</label>
          <div class="col-sm-8">
           <select name="order_id" class="form-control" id ="select2">
             <option value=""></option>
             @foreach($workorder as $data)
             <option value="{{$data->pelanggan_id}}" data-nama="{{$data->nama}}" data-alamat="{{$data->alamat}}" data-nopol="{{$data->no_pol}}" data-telepon="{{$data->telepon}}" data-tipe="{{$data->tipe}}" data-nokanosin="{{$data->noka_nosin}}" data-warna="{{$data->warna}}" data-km="{{$data->km_datang}}" data-fuel="{{$data->fuel_datang}}" data-tanggal="{{$data->tanggal}}">{{$data->no_wo}}</option>
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
                <tr id="field-baru-part">
                  <td class="text-center">
                    <select name="part[]" class="select2 selectpart form-control" style="width: 100%;">
                    <option value="">Pilih Sparepart</option>
                      @foreach($part as $data_part)
                        <option value="{{$data_part->id}}" data-harga="{{$data_part->harga_jual}}">{{title_case($data_part->nama)}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td class="text-center"><input type="number" placeholder="Masukan Quantity" min="0" class="form-control"></td>
                  <td class="text-center"><input type="text" disabled class="form-control data_harga_part"></td>
                  <td class="text-center"><input type="text" disabled class="form-control"></td>
                  <td class="text-center"></td>
                </tr>
            </table>
          </div>
          {{-- <a href="{{url('estimasi-biaya/pilih-sparepart')}}">Tambah</a> --}}
          <a onclick="tambah_part()" class="btn btn-primary">Tambah</a>
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
              <th class="text-center">Jasa</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Jumlah</th>
              <th class="text-center"></th>
            </tr>
            <tr id="field-baru-jasa">
              <td class="text-center">
                <select name="" class="select2 form-control">
                  @foreach($jasa as $data_jasa)
                    <option value="{{$data_jasa->id}}">{{title_case($data_jasa->nama_jasa)}}</option>
                  @endforeach
                </select>
              </td>
              <td class="text-center"><input type="text" class="form-control"></td>
              <td class="text-center"><input type="text" class="form-control" disabled></td>
              <td class="text-center"><input type="text" class="form-control" disabled></td>
              <td class="text-center"></td>
            </tr>
          </table>
          {{-- <a href="{{url('estimasi-biaya/pilih-jasa')}}">Tambah</a> --}}
          <a onclick="tambah_jasa()" class="btn btn-primary">Tambah</a>
        </div>
      </div>
    </div>
  </div>
<div class="row">
  <div class="col-sm-10 col-sm-offset-1">
    <h4><b>Keterangan</b></h4>
    <textarea class="form-control" name="keterangan" id="" cols="30" rows="10"></textarea>
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
<script>
  $('.selectpart').change(function(){
    value       = $(this).val(),
    $obj        = $('.selectpart option[value="'+value+'"]'),
    harga_part  = $obj.attr('data-harga');
    $('.data_harga_part').val(harga_part);
  });
  function tambah_part(){
        $('<tr id="baru">'+
            '<td class="text-center">'+
              '<select name="part[]" class="select2 selectpart form-control" style="width: 100%;">'+
              '<option value="">Pilih Sparepart</option>'+
                  @foreach ($part as $data_part) 
                    '<option value="{{$data_part->id}}" data-harga="{{$data_part->harga_jual}}">{{$data_part->nama}}</option>'+
                  @endforeach
              '</select>'+
            '</td>'+
            '<td class="text-center"><input type="number" placeholder="Masukan Quantity" min="0" class="form-control"></td>'+
            '<td class="text-center"><input type="text" class="form-control data_harga_part" disabled></td>'+
            '<td class="text-center"><input type="text" class="form-control" disabled></td>'+
            '<td><a data-toggle="tooltip" title="Hapus Field" class="remove_field btn btn-danger"><i class="fa fa-trash-o"></i></a></td>'+
            '</tr>').insertBefore('#field-baru-part');
        $(".remove_field").click(function(){
            $(this).closest("tr").remove();
        });
    }

    function tambah_jasa(){
        $('<tr id="baru-jasa">'+
            '<td class="text-center">'+
              '<select name="jasa[]" class="select2 form-control" style="width: 100%;">'+
                  @foreach ($jasa as $data_jasa) 
                    '<option value="{{$data_jasa->id}}">{{$data_jasa->nama_jasa}}</option>'+
                  @endforeach
              '</select>'+
            '</td>'+
            '<td class="text-center"><input type="number" placeholder="Masukan Quantity" min="0" class="form-control"></td>'+
            '<td class="text-center"><input type="text" class="form-control" disabled></td>'+
            '<td class="text-center"><input type="text" class="form-control" disabled></td>'+
            '<td><a data-toggle="tooltip" title="Hapus Field" class="remove_field btn btn-danger"><i class="fa fa-trash-o"></i></a></td>'+
            '</tr>').insertBefore('#field-baru-jasa');
        $(".remove_field").click(function(){
            $(this).closest("tr").remove();
        });
    }
</script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
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
