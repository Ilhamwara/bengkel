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
        <span>Pilih Sparepart</span>
      </li>
    </ul>
  </div>
  <h3 class="page-title"><b>Pilih Sparepart</b></h3>
  <br>
  <div class="row">
    <form action="{{url('post-pilih-sparepart')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
      {{ csrf_field() }}            
      <div class="form-group">
        <label class="col-sm-2 control-label">Pilih Sparepart</label>
        <div class="col-sm-6">
         <select name="sparepart" class="form-control" id ="select3">
           <option value=""></option>
           @foreach($spareparts as $data)
           <option value="{{$data->id}}" data-sparepart="{{$data->nama}}" data-nomor="{{$data->no}}" data-harga="{{$data->harga_jual}}">{{$data->nama}}</option>
           @endforeach
         </select>
       </div>
       </div>
       <div class="form-group">
         <label class="col-sm-2 control-label">Nama Part</label>
         <div class="col-sm-6">
          <input type="text" class="form-control" name="nama" id="data_sparepart" disabled>
        </div>
      </div>

       <div class="form-group">
         <label class="col-sm-2 control-label">No Part</label>
         <div class="col-sm-6">
          <input type="text" class="form-control" name="quantity_sparepart" id="data_nomor" disabled>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Quantity</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="quantity_sparepart">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Harga</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="total_harga_sparepart" id="data_harga" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Total</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="total_harga_sparepart">
        </div>
      </div>
    </div>
    <input type="hidden" value="{{ 'csrf_token' }}" name="token">
    <div class="form-group">
      <div class="col-sm-offset-1 col-sm-10">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </form>

</div>
</div>
@endsection

@section('js')
<script>$('#select3').change(function(){
    var
    value = $(this).val(),
    $obj = $('#select3 option[value="'+value+'"]'),
    sparepart = $obj.attr('data-sparepart'),
    nomor = $obj.attr('data-nomor');
    harga = $obj.attr('data-harga');

    
    
    $('#data_sparepart').val(sparepart);
    $('#data_nomor').val(nomor);
    $('#data_harga').val(harga);


});
</script>
@endsection