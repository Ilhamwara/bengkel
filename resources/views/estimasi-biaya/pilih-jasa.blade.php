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
  @include('include.alert')
    <form action="{{url('post-pilih-jasa')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
      {{ csrf_field() }} 
      <input type="hidden" name="idest" value="{{$idest}}">           
      <div class="form-group">
        <label class="col-sm-2 control-label">Pilih Jasa</label>
        <div class="col-sm-6">
          <select name="jasa" class="select2 form-control" id ="select3">
           <option>Pilih Jasa</option>
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
        <input type="text" class="form-control" name="fr" id="banyaknya" value="0" onblur="checkNum($(this))">
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
        <input type="text" class="form-control" name="total_harga_jasa" id="sum" value="0">
      </div>
    </div>
  </div>
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
<script src="{{asset('recources/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
<script>$('#select3').change(function(){
  var
  value = $(this).val(),
  $obj = $('#select3 option[value="'+value+'"]'),
  jasa = $obj.attr('data-jasa'),
  harga = $obj.attr('data-harga');

  $('#data_jasa').val(jasa);
  $('#data_harga').val(harga);


});
function checkNum(obj) {
        v = obj.val();
        if (!$.isNumeric(v)) {
            alert('Anda harus memasukan angka');
            obj.val('0');
            return false;
        }
    }
</script>

  <script type="text/javascript">
  $('input[name=qty], input[name=harga_perfr]').keyup(function() {
    var divParent = $(this).closest('div');
    var qty = $('input[name=qty]', divParent).val()-0;
    var price = $('input[name=harga_perfr]', divParent).val()-0;
    if (qty >= 0 && price >= 0)
      $('input[name=jumlah]', divParent).text(qty*price);
  });

  $(document).ready(function() {
    //this calculates values automatically 
    sum();
    $("#banyaknya, #data_harga").on("keydown keyup", function() {
      sum();
    });
  });

  function sum() {
    var num1 = document.getElementById('banyaknya').value;
    var num2 = document.getElementById('data_harga').value;

    var result = parseInt(num1) * parseInt(num2);
    if (!isNaN(result)) {
      document.getElementById('sum').value = result;

    }
  }

</script>
@endsection