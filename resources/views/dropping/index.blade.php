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
                <span>Dropping</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"><b>Dropping</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="col-md-4">
                        <form action="" method="POST">
                        {{csrf_field()}}
                            <div class="form-group" style="overflow: hidden;">
                                <div class="col-md-3">
                                    <label for="">Tahun</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control">
                                        <option value="">2017</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="overflow: hidden;">
                                <div class="col-md-3">
                                    <label for="">Periode</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="overflow: hidden;">
                                <div class="col-md-3">
                                    <label for="">Cabang</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control">
                                        <option value="">Jakarta Timur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="overflow: hidden;">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-warning">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center"> Tanggal </th>
                                    <th class="text-center"> Jumlah </th>
                                    <th class="text-center"> Akun Bank </th>
                                    <th class="text-center"> Kantor Cabang </th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td class="text-center">1</td>
                                    <td class="text-center"> shuxer </td>
                                    <td class="text-center">shuxer@gmail.com </td>
                                    <td class="text-center"> 120 </td>
                                    <td class="center"> 12 Jan 2012 </td>
                                    <td class="text-center">
                                        <a href="{{url('tarik-dropping')}}" class="btn btn-default">Selanjutnya</a>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td class="text-center">
                                        2
                                    </td>
                                    <td class="text-center"> looper </td>
                                    <td class="text-center">looper90@gmail.com </td>
                                    <td class="text-center"> 120 </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td class="text-center">
                                        <a href="{{url('tarik-dropping')}}" class="btn btn-default">Selanjutnya</a>
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
    <script src="{{asset('recources/global/scripts/app.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('recources/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
@endsection