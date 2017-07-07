@extends('layouts.master')
@section('css')
    
    
@endsection
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Input Transaki</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"><b>Input Transaksi</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered" style="overflow: hidden;">
                <div class="portlet-title">
                    <div class="col-md-12">
                        <form class="">
                          <div class="col-md-12 form-group">
                              <div class="col-md-2">
                                  <label><b>Tanggal</b></label>
                              </div>
                              <div class="col-md-2">
                                  20-02-2017
                              </div>
                          </div>
                          <div class="col-md-12 form-group">
                            <div class="col-md-2">
                                <label><b>No Batch</b></label>
                            </div>
                            <div class="col-md-2">
                                KK556
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                <div class="portlet-body">
                        <div class="table-responsive">
                        <a onclick="tambah()" class="btn btn-warning">Tambah <i class="fa fa-plus"></i></a>
                        <br><br>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                               <tr>
                                   <th class="text-center"></th>
                                   <th class="text-center">Tanggal</th>
                                   <th class="text-center">Item</th>
                                   <th class="text-center">Uraian</th>
                                   <th class="text-center">Sub Pos</th>
                                   <th class="text-center">Mata Anggaran</th>
                                   <th class="text-center">Kas/Bank</th>
                                   <th class="text-center">Account</th>
                                   <th class="text-center">Anggaran</th>
                                   <th class="text-center">Jumlah</th>
                               </tr>
                               <tr id="field-baru">
                                   <td></td>
                                   <td class="text-center"><input class="form-control" type="date" name="tanggal"></td>
                                   <td class="text-center"><input class="form-control" type="text" name="item"></td>
                                   <td class="text-center"><textarea class="form-control" name="uraian"></textarea></td>
                                   <td class="text-center"><input class="form-control" type="text" name="pos"></td>
                                   <td class="text-center"><input class="form-control" type="text" name="mata"></td>
                                   <td class="text-center"><input class="form-control" type="text" name="kas"></td>
                                   <td class="text-center"><input class="form-control" type="text" name="akun"></td>
                                   <td class="text-center"><input class="form-control" type="text" name="anggaran"></td>
                                   <td class="text-center"><input class="form-control" type="text" name="jumlah"></td>
                               </tr>
                            </table>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4" style="padding: 0px;">
                                <input type="file" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-primary pull-right">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  function tambah(){
        $('<tr class="baru">'+
            '<td><a data-toggle="tooltip" title="Hapus Field" class="remove_field btn btn-danger"><i class="fa fa-trash-o"></i></a></td>'+
            '<td class="text-center"><input class="form-control" type="date" name="tanggal"></td>'+
            '<td class="text-center"><input class="form-control" type="text" name="item"></td>'+
            '<td class="text-center"><textarea class="form-control" name="uraian"></textarea></td>'+
            '<td class="text-center"><input class="form-control" type="text" name="pos"></td>'+
            '<td class="text-center"><input class="form-control" type="text" name="mata"></td>'+
            '<td class="text-center"><input class="form-control" type="text" name="kas"></td>'+
            '<td class="text-center"><input class="form-control" type="text" name="akun"></td>'+
            '<td class="text-center"><input class="form-control" type="text" name="anggaran"></td>'+
            '<td class="text-center"><input class="form-control" type="text" name="jumlah"></td>'+
            '</tr>').insertBefore('#field-baru');
        $(".remove_field").click(function(){
            $(this).closest("tr").remove();
        });
    }
</script>
@endsection