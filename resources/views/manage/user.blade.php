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
                <span>User Management</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"><b>User Management</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">

                </div>
                <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center"> Nama </th>
                                    <th class="text-center"> Kantor Cabang </th>
                                    <th class="text-center"> Role </th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $k => $data)
                                <tr class="odd gradeX">
                                    <td class="text-center">{{$k+1}}</td>
                                    <td class="text-center"> {{$data->name}} </td>
                                    <td class="text-center"> {{$data->email}} </td>
                                    <td class="text-center"> {{$data->type}} </td>
                                    <td class="text-center">
                                        <a href="{{url('tarik-dropping')}}" class="btn btn-default">Selanjutnya</a>
                                    </td>
                                </tr>
                            @endforeach                              
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