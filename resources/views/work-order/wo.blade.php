@extends('layouts.master')
@section('css')
<link href="{{asset('recources/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('recources/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />     
<style>
	.action li{
		display: inline-block;
		list-style-type: none;
	}
	.action{
		padding-left: 0;
	}
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
				<span>Data Work Order</span>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h3 class="page-title"><b>Data Work Order</b></h3>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light bordered">
				<div class="portlet-body">
				@include('include.alert')
					<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
						<thead>
							<tr><th class="text-center">No</th>
								<th class="text-center">No WO</th>
								<th class="text-center">Customer</th>
								<th class="text-center">Km Fuel</th>
								<th class="text-center">Km Datang</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>

						<tbody>
							@forelse($orders as $i => $ord)
							<tr>
								<td>{{$i+1}}</td>
								<td class="text-center">{{$ord->no_wo}}</td>
								<td class="text-center">{{$ord->nama_pelanggan}}</td>
								<td class="text-center">{{$ord->fuel_datang}}</td>
								<td class="text-center">{{$ord->km_datang}}</td>
								<td class="text-center">
									<ul class="action">

										<li><a href="{{url('work-order/'.$ord->no_wo)}}" class="btn btn-warning"  data-toggle="tooltip" title="Detail" style="padding: 6px 12px;"><i class="fa fa-eye"></i></a></li>
										<li><a href="{{url('hapus/pelanggan/'.$ord->id)}}" class="btn btn-danger"  data-toggle="tooltip" title="Hapus" style="padding: 6px 12px;"><i class="fa fa-trash-o"></i></a></li>
										<li><a href="{{url('buat-inspection/'.$ord->id)}}" class="btn btn-success"  data-toggle="tooltip" title="Buat Vehicle Inspection" style="padding: 6px 12px;"><i class="fa fa-truck"></i></a></li>
										<li><a href="{{url('buat-estimasi-biaya/'.$ord->no_wo)}}" class="btn btn-success"  data-toggle="tooltip" title="Buat Estimasi Biaya" style="padding: 6px 12px;"><i class="fa fa-calculator"></i></a></li></a></li>

									</ul>
								</td>

							</tr>
							@empty
							@endforelse
						</tbody>

					</table>
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



