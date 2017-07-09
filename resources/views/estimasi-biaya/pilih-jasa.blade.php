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
        <span>Pilih Jasa</span>
      </li>
    </ul>
  </div>
  <h3 class="page-title"><b>Pilih Jasa</b></h3>
  <br>
  <div class="row">
    <form action="{{url('post-pilih-jasa')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
      {{ csrf_field() }}            
      <div class="form-group">
        <label class="col-sm-2 control-label">Pilih Jasa</label>
        <div class="col-sm-6">
          <select name="jasa" class="form-control" id ="select3">
           <option value=""></option>
           @foreach($jasas as $data)
           <option value="{{$data->id}}" data-jasa="{{$data->nama_jasa}}"  data-harga="{{$data->harga_perfr}}">{{$data->nama_jasa}}</option>
           @endforeach
         </select>
       </div>
     </div>
      <div class="form-group">
       <label class="col-sm-2 control-label">Jasa</label>
       <div class="col-sm-6">
        <input type="text" class="form-control" name="fr" id="data_jasa" disabled>
      </div>
    </div>

     <div class="form-group">
       <label class="col-sm-2 control-label">FR</label>
       <div class="col-sm-6">
        <input type="text" class="form-control" name="fr">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Harga per FR</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="harga_perfr" id="data_harga" disabled>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Jumlah</label>
      <div class="col-sm-6">
      <input type="text" class="form-control" name="total_harga_jasa">
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
  jasa = $obj.attr('data-jasa'),
  harga = $obj.attr('data-harga');

  $('#data_jasa').val(jasa);
  $('#data_harga').val(harga);


});
</script>
@endsection