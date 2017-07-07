@extends('layouts.master')
@section('css')    
    <style>
      .show{display: block;}
      .hilang{display: none;}
    </style>
@endsection
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Konfirmasi Transaki</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"><b>Konfirmasi Transaksi</b></h3>
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
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                               <tr>
                                   <th class="text-center">No</th>
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
                               <tr>
                                   <td class="text-center">1</td>
                                   <td class="text-center">Tanggal</td>
                                   <td class="text-center">Item</td>
                                   <td class="text-center">Uraian</td>
                                   <td class="text-center">Sub Pos</td>
                                   <td class="text-center">Mata Anggaran</td>
                                   <td class="text-center">Kas/Bank</td>
                                   <td class="text-center">Account</td>
                                   <td class="text-center">Anggaran</td>
                                   <td class="text-center">Jumlah</td>
                                </tr>
                                <tr>
                                   <td class="text-center" colspan="8"></td>
                                   <th class="text-center">Total</th>
                                   <th class="text-center">8797</th>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4" style="padding: 0px;">
                                <a href="" class="btn btn-warning">Unduh File</a>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-danger pull-right" id="tolak">Tolak</button>
                            <button class="btn btn-primary pull-right">Terima</button>
                        </div>
                        <br><br>
                        <div class="form-group hilang" id="alasan">
                            <div class="col-md-3 pull-right" style="padding: 0px;">
                                <textarea name="alasan" cols="50" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
  $(function() {                       
    $("#tolak").click(function() {  
      $('#alasan').removeClass("hilang");      
      $('#alasan').addClass("show");      
    });
  });
</script>
@endsection