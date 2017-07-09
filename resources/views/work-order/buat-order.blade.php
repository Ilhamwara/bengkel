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
                <span>Buat Order Work</span>
            </li>
        </ul>
    </div>

    <h3 class="page-title"><b>Buat Order Work</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('post-order')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="col-sm-2 control-label">Pilih Customer</label>
                    <div class="col-sm-6">
                     <select name="pelanggan" class="form-control" id ="select2">
                         <option value="">Pilih Pelanggan</option>
                         @foreach($pelanggan as $data)
                         <option value="{{$data->id}}" data-nama="{{$data->nama}}" data-alamat="{{$data->alamat}}" data-nopol="{{$data->no_pol}}" data-telepon="{{$data->telepon}}" data-tipe="{{$data->tipe}}" data-nokanosin="{{$data->noka_nosin}}" data-warna="{{$data->warna}}">{{$data->nama}}</option>
                         @endforeach
                     </select>
                 </div>
             </div>

             <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" min="0" name="nama_pelanggan" id="data_nama" disabled> 
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
                <label class="col-sm-2 control-label">No WO</label>
                <div class="col-sm-6">
                    <input type="tet" class="form-control" name="no_wo" placeholder="No WO" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Km Datang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="km_datang" placeholder="Km Datang" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Fuel Datang</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="fuel_datang" placeholder="Fuel Datang" required>
                </div>
            </div>
           <!--  <div class="form-group">
                <label class="col-sm-2 control-label">Keluhan</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="keluhan" placeholder="Keluhan" required></textarea>
                </div>
            </div> -->

            <div class="col-md-12">
                <div class="portlet light bordered">

                  <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Keluhan</th>
                          <th class="text-center">Action</th>
                      </tr>
                  </thead>   
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td class="text-center"><input type="text" class="form-control" name="keluhan[]"></td>
                      <td class="text-center"><button class="btn btn-info" id="add"><i class="fa fa-plus"></i></button></td>
                  </tr>
              </tbody>
          </table>     
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
    alamat = $obj.attr('data-alamat');
    nopol = $obj.attr('data-nopol'),
    telepon = $obj.attr('data-telepon');
    tipe = $obj.attr('data-tipe'),
    nokanosin = $obj.attr('data-nokanosin');
    warna = $obj.attr('data-warna'),
    
    
    $('#data_nama').val(nama);
    $('#data_alamat').val(alamat);
    $('#data_nopol').val(nopol);
    $('#data_telepon').val(telepon);
    $('#data_tipe').val(tipe);
    $('#data_nokanosin').val(nokanosin);
    $('#data_warna').val(warna);

});
</script>
<script>
  var cnt = 2;

$("#add").click(function() {
  $("table").append("<tr><td>"+cnt+"</td><td class='text-center'><input type='text' class='form-control' name='keluhan[]'></td><td class='text-center'><button class='btn btn-danger' id='delete'><i class='fa fa-trash'></i></button></td></tr>" );
  cnt++;
});

$("table").on('click', '#delete', function() {
 $(this).closest("tr").remove();
});
</script>
@endsection
