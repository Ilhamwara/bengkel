@extends('layouts.master')
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Tarik Dropping</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"><b>Tarik Dropping</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <a onclick="tambah()" class="btn btn-warning">Tambah <i class="fa fa-plus"></i></a>
            <br><br>
           <form action="" method="POST">
           {{csrf_field()}}
               <table class="table table-striped">
                   <tr>
                       <th class="text-center">Tanggal</th>
                       <th class="text-center">Jumlah</th>
                       <th class="text-center">Akun Bank</th>
                       <th class="text-center">Kantor Cabang</th>
                       <th class="text-center">Status</th>
                   </tr>
                   <tr id="field-baru">
                       <td class="text-center"><input type="date" class="form-control"></td>
                       <td class="text-center"><input type="number" placeholder="Masukan Jumlah" min="0" class="form-control"></td>
                       <td class="text-center"><input type="number" placeholder="Masukan Akun Bank" class="form-control"></td>
                       <td class="text-center"><input type="text" placeholder="Masukan Kantor Cabang" class="form-control"></td>
                       <td class="text-center">
                           <label class="label label-success">Posting</label>
                       </td>
                   </tr>
               </table>
               <div class="form-group">
                   <button class="btn btn-primary pull-right">Posting</button>
               </div>
           </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  function tambah(){
        $('<tr id="baru">'+
            '<td class="text-center"><input type="date" class="form-control"></td>'+
            '<td class="text-center"><input type="number" placeholder="Masukan Jumlah" min="0" class="form-control"></td>'+
            '<td class="text-center"><input type="number" placeholder="Masukan Akun Bank" class="form-control"></td>'+
            '<td class="text-center"><input type="text" placeholder="Masukan Kantor Cabang" class="form-control"></td>'+
            '<td><a data-toggle="tooltip" title="Hapus Field" class="remove_field btn btn-danger"><i class="fa fa-trash-o"></i></a></td>'+
            '</tr>').insertBefore('#field-baru');
        $(".remove_field").click(function(){
            $(this).closest("tr").remove();
        });
    }
</script>
@endsection