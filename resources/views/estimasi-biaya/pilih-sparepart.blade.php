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
    @include('include.alert')
    <form action="{{url('post-pilih-sparepart')}}" method="POST" enctype="multipart/form-data" class="form-horizontal" style="overflow: hidden;">
      {{ csrf_field() }}    
      <input type="hidden" name="idest" value="{{$idest}}" >        
      <div class="form-group">
        <label class="col-sm-2 control-label">Pilih Sparepart</label>
        <div class="col-sm-6">
         <select name="sparepart" class="form-control select2" id ="select3">
           <option>Pilih Sparepart</option>
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
      <input type="text" onblur="checkNum($(this))" class="form-control" id="qty" name="quantity_sparepart" value="0">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Harga</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="data_harga" name="data_harga" disabled>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Total</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="total_harga_sparepart" id="total" value="0" readonly>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-offset-1 col-sm-10">
    <button class="btn btn-primary">Tambah</button>
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
  sparepart = $obj.attr('data-sparepart'),
  nomor = $obj.attr('data-nomor');
  harga = $obj.attr('data-harga');

  
  
  $('#data_sparepart').val(sparepart);
  $('#data_nomor').val(nomor);
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
  $('input[name=quantity_sparepart], input[name=data_harga]').keyup(function() {
    var divParent = $(this).closest('div');
    var qty = $('input[name=quantity_sparepart]', divParent).val()-0;
    var price = $('input[name=data_harga]', divParent).val()-0;
    if (qty >= 0 && price >= 0)
      $('input[name=total_harga_sparepart]', divParent).text(qty*price);
  });

  $(document).ready(function() {
    //this calculates values automatically 
    sum();
    $("#qty, #data_harga").on("keydown keyup", function() {
      sum();
    });
  });

  function sum() {
    var num1 = document.getElementById('qty').value;
    var num2 = document.getElementById('data_harga').value;

    var result = parseInt(num1) * parseInt(num2);
    if (!isNaN(result)) {
      document.getElementById('total').value = result;

    }
  }

</script>
@endsection