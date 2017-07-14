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
        <span>Buat Purchase Order</span>
      </li>
    </ul>
  </div>

  <h3 class="page-title"><b>Buat Purchase Order</b></h3>
  <br>
  <div class="row">
    <div class="col-md-12">
    @include('include.alert')
      <form action="{{url('post-purchase-order')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
          <label class="col-sm-2 control-label">Supplier</label>
          <div class="col-sm-6">
             <select name="supplier" class="select2 form-control" required>
                 <option value="">Pilih Supplier</option>
                 @foreach($supp as $data)
                    <option value="{{$data->id}}">{{$data->nama}}</option>
                 @endforeach
             </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Alamat</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="alamat" required> 
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">No. PO</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="no_po" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Tanggal</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="tanggal" value="{{date('d-m-Y')}}" readonly>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Status</label>
          <div class="col-sm-6">
            <select name="status" class="form-control" id ="select2">
             <option value="reguler">Reguler</option>
             <option value="emergency">Emergency</option>
           </select>
         </div>
       </div>

       <div class="col-md-12">
        <div class="portlet light bordered">

          <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Part Number</th>
                  <th class="text-center">Part Name</th>
                  <th class="text-center">Qty</th>
                  <th class="text-center">ORY</th>
                  <th class="text-center">Thailand</th>
                  <th class="text-center">Jepang</th>
                   <th class="text-center">Action</th>
                </tr>
              </thead>   
              <tbody>
                <tr>
                  <td>1</td>
                  <td class="text-center"><input type="text" class="form-control" required name="number[]"></td>
                  <td class="text-center"><input type="text" class="form-control" required name="nama[]"></td>
                  <td class="text-center"><input type="text" class="form-control" required name="qty[]"></td>
                  <td class="text-center"><input type="text" class="form-control" required name="ory[]"></td>
                  <td class="text-center"><input type="text" class="form-control" required name="thailand[]"></td>
                  <td class="text-center"><input type="text" class="form-control" required name="jepang[]"></td>
                  <td class="text-center"><a class="btn btn-info" id="add"><i class="fa fa-plus"></i></a></td>
                </tr>
              </tbody>
            </table>     
          </div>
        </div>
      </div>
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
  var cnt = 2;

$("#add").click(function() {
  $("table").append("<tr><td>"+cnt+"</td><td class='text-center'><input type='text' class='form-control' name='number[]''></td><td class='text-center'><input type='text' class='form-control' name='nama[]'></td><td class='text-center'><input type='text' class='form-control' name='qty[]''></td><td class='text-center'><input type='text' class='form-control' name='ory[]'></td><td class='text-center'><input type='text' class='form-control' name='thailand[]'></td><td class='text-center'><input type='text' class='form-control' name='jepang[]'></td><td><button class='btn btn-danger' id='delete'><i class='fa fa-trash'></i></button></td></tr>" );
  cnt++;
});

$("table").on('click', '#delete', function() {
 $(this).closest("tr").remove();
});
</script>
@endsection