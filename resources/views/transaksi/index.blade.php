@extends('layouts.master')
@section('css')
    <link href="{{asset('recources/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('recources/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />       
@endsection
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Transaki</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"><b>Transaksi</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="col-md-12">
                        <form class="form-inline">
                          <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>No Batch</label>
                            <input type="text" class="form-control" placeholder="Masukan No Batch">
                          </div>
                          <button type="submit" class="btn btn-info">Cari</button>
                        </form>
                    </div>
                </div>
                <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center"> Tanggal </th>
                                    <th class="text-center"> No Batch </th>
                                    <th class="text-center"> Status </th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td class="text-center">1</td>
                                    <td class="text-center"> shuxer </td>
                                    <td class="text-center"> 12 Jan 2012 </td>
                                    <td class="text-center"> <label class="label label-warning">Simpan</label> </td>
                                    <td class="text-center">
                                        <a href="{{url('confirm-transaksi')}}" class="btn btn-primary">Confirm</a>
                                        <a href="{{url('verifikasi-transaksi')}}" class="btn btn-success">Verifikasi</a>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td class="text-center">1</td>
                                    <td class="text-center"> shuxer </td>
                                    <td class="text-center"> 12 Jan 2012 </td>
                                    <td class="text-center"> <label class="label label-success">Kirim</label> </td>
                                    <td class="text-center">
                                        <a href="{{url('confirm-transaksi')}}" class="btn btn-primary">Confirm</a>
                                        <a href="{{url('verifikasi-transaksi')}}" class="btn btn-success">Verifikasi</a>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td class="text-center">1</td>
                                    <td class="text-center"> shuxer </td>
                                    <td class="text-center"> 12 Jan 2012 </td>
                                    <td class="text-center"> <label class="label label-success">Terima</label> </td>
                                    <td class="text-center">
                                        <a href="{{url('confirm-transaksi')}}" class="btn btn-primary">Confirm</a>
                                        <a href="{{url('verifikasi-transaksi')}}" class="btn btn-success">Verifikasi</a>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td class="text-center">1</td>
                                    <td class="text-center"> shuxer </td>
                                    <td class="text-center"> 12 Jan 2012 </td>
                                    <td class="text-center"> <label class="label label-danger">Tolak</label> </td>
                                    <td class="text-center">
                                        <a href="{{url('edit-transaksi')}}" class="btn btn-warning">Edit</a>
                                        <a href="{{url('confirm-transaksi')}}" class="btn btn-primary">Confirm</a>
                                        <a href="{{url('verifikasi-transaksi')}}" class="btn btn-success">Verifikasi</a>
                                    </td>
                                </tr>              
                                <tr class="odd gradeX">
                                    <td class="text-center">1</td>
                                    <td class="text-center"> shuxer </td>
                                    <td class="text-center"> 12 Jan 2012 </td>
                                    <td class="text-center"> <label class="label label-danger">Tidak Diverifikas</label> </td>
                                    <td class="text-center">
                                        <a href="{{url('edit-transaksi')}}" class="btn btn-warning">Edit</a>
                                        <a href="{{url('confirm-transaksi')}}" class="btn btn-primary">Confirm</a>
                                        <a href="{{url('verifikasi-transaksi')}}" class="btn btn-success">Verifikasi</a>
                                    </td>
                                </tr>                                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{asset('recources/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('recources/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('recources/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('recources/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
@endsection