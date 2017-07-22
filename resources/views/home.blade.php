@extends('layouts.master')
@section('content')

@php

    $workorder = DB::table('work_order')->count();
    $vehicle = DB::table('vehicle_inspection')
    ->groupBy('kode')
    ->count();
    $estimasi = DB::table('estimasi_biaya')
    ->where('wo_id', '>', 0)->count();

 @endphp

<div class="page-content">
    <!-- BEGIN PAGE HEADER-->
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Dashboard</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> Dashboard
        <small>dashboard & statistics</small>
    </h3>
    <!-- END PAGE TITLE-->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$workorder}}">0</span>
                    </div>
                    <div class="desc"> Work Order </div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>


                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$vehicle}}">0</div>
                            <div class="desc"> Vehicle Inspection </div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{$estimasi}}">0</span>
                            </div>
                            <div class="desc"> Estimasi Biaya </div>
                        </div>
                        <a class="more" href="javascript:;"> View more
                            <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="89">0</div>
                                <div class="desc"> Nota Service </div>
                            </div>
                            <a class="more" href="javascript:;"> View more
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
            @section('js')
            <script src="{{asset('recources/global/plugins/moment.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('recources/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>        
            <script src="{{asset('recources/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('recources/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('recources/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('recources/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('recources/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('recources/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('recources/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
            @endsection