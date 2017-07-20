@extends('layouts.master')
@section('css')
<link href="{{asset('recources/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('recources/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" /> 
<style>
	.action li{
		display: inline-block;
		list-style-type: none;
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
				<span>Data Vehicle Inspection</span>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h3 class="page-title"><b>Data Vehicle Inspection</b></h3>
	<br>
	<div class="row">
		<div class="col-md-12">
			@include('include.alert')
			<div class="portlet light bordered">
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">No Wo</th>
								<th class="text-center">Tanggal Inspect</th>
								<th class="text-center">Keterangan</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						
						<tbody>
							@forelse($inspection as $i => $inspect)
							<tr>
								<td>{{$i+1}}</td>
								<td class="text-center">{{$inspect->nomor_wo}}</td>
								<td class="text-center">{{$inspect->tanggal}}</td>		
								<td class="text-center">{!!$inspect->keterangan!!}</td>
								<td class="text-center">
									<ul class="action">
										<li><a href="{{url('detail/inspection/'.$inspect->kode)}}" class="btn btn-warning"  data-toggle="tooltip" title="Detail" style="padding: 6px 12px;"><i class="fa fa-eye"></i></a></li>
										<li><a href="{{url('hapus/inspection/'.$inspect->kode)}}" class="btn btn-danger"  data-toggle="tooltip" title="Hapus" style="padding: 6px 12px;"><i class="fa fa-trash-o"></i></a></li>
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
</div>
@endsection
@section('js')
<script src="{{asset('recources/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('recources/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('recources/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('recources/global/scripts/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('recources/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
@endsection