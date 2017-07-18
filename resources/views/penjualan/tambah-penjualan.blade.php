
@extends('layouts.master')
@section('content')
<div class="page-content">
  <div class="page-bar">
    <ul class="page-breadcrumb">
      <li>
        <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
      </li>
      <li>
        <span>Tambah Penjualan Sparepart</span>
      </li>
    </ul>
  </div>

  <h3 class="page-title"><b>Tambah Penjualan Sparepart</b></h3>
  <br>
  <div class="row">
    <div class="col-md-12">
      @include('include.alert')
      <form action="{{url('post-penjualan')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
         <label class="col-sm-2 control-label text-left">No Nota</label>
         <div class="col-sm-9">
          <input type="text" class="form-control" name="no_nota" placeholder="No Nota" required> 
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label text-left">Tgl Nota</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="tgl_nota" placeholder="Tgl Nota" disabled value="{{date('d-m-Y')}}"> 
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label text-left">No BKB</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="no_bkb" placeholder="No_BKB" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label text-left">No Pol</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="no_pol" placeholder="No Pol" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label text-left">Nama</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="nama" placeholder="Nama" required>
        </div>
      </div>
      <div class="form-group">
       <label class="col-sm-2 control-label text-left">Kode</label>
       <div class="col-sm-9">
        <input type="text" class="form-control" name="kode" placeholder="Kode" required>
      </div>
    </div>
    <div class="form-group">
     <label class="col-sm-2 control-label text-left">Alamat</label>
     <div class="col-sm-9">
      <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label text-left">Kota</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="kota" placeholder="kota" required>
    </div>
  </div>

  <div class="col-md-12">
    <div class="portlet light bordered">

      <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama Part</th>
              <th class="text-center">No Part</th>
              <th class="text-center">Qty</th>
              <th class="text-center">Harga Satuan</th>
              <th class="text-center">Jumlah</th>
            </tr>
          </thead>   
          <tbody>
            @forelse($penj_part as $i => $part)
            <tr>
              <td>{{$i+1}}</td>
              <td class="text-center">{{$part->nama}}</td>
              <td class="text-center">{{$part->no}}</td>
              <td class="text-center">{{$part->qty}}</td>
              <td class="text-center">{{$part->harga_jual}}</td>
              <td class="text-center">{{$part->jumlah}}</td>
            </tr>
            <input type="hidden" name="id_part[]" value="{{$part->id}}">
            @empty
            <tr>
              <td colspan="6">Kosong</td>
            </tr>
            @endforelse
            <td colspan="5" class="text-center">Total</td>
            <td class="text-center">Rp {{$penj_part->sum('jumlah')}}</td>
          </tbody>
        </table>
        <a href="{{url('penjualan/jual-sparepart/'.$cek_penj->no_penj)}}" class="btn btn-primary">Tambah</a>
         <!-- <a class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah</a>  -->    
      </div>
    </div>
  </div>

  @if(count($penj_part) > 0)
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
  @endif


</form>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Part</h4>
      </div>
      <div class="modal-body">
        <form action="{{url('post-jual-sparepart')}}" method="POST" enctype="multipart/form-data" class="form-horizontal" style="overflow: hidden;">
          {{ csrf_field() }}    
          <input type="hidden" name="idpenj" value="" >        
          <div class="form-group">
            <label class="col-sm-2 control-label">Pilih Sparepart</label>
            <div class="col-sm-6">
             <select name="sparepart" class="form-control select2" id ="select3">
               <option>Pilih Sparepart</option>
               @foreach($part as $data)
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
      <div class="form-group">
        <div class="col-sm-offset-1 col-sm-10">
          <button class="btn btn-primary">Tambah</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>

</div>

</div>

</div>



</div>
</div>
@endsection
@section('js')
<script src="{{asset('recources/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<!-- <script>
  $(document).ready(function() {
    $("#select3").select2();
  });
</script> -->
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
