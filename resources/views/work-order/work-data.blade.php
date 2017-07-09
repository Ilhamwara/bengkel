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
					<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
						<thead>
							<tr><th class="text-center">No</th>
						<th class="text-center">No WO</th>
						<th class="text-center">Customer</th>
						<th class="text-center">Work Order</th>
						<th class="text-center">Vehicle Inspection</th>
						<th class="text-center">Nota Service</th>
						<th class="text-center">Estimasi Biaya</th>
					</tr>
				</thead>
				<?php $i = 0 ?>
				<tbody>@forelse($orders as $order)
					<?php $i++ ?>
					<tr>
						<td>{{$i}}</td>
						<td class="text-center">{{$order->no_wo}}</td>
						<td class="text-center">{{$order->nama_pelanggan}}</td>
						<td class="text-center"><a href="{{url('work-order/'. $order->id)}}">Tampilkan</a></td>
						<td class="text-center"><a href="{{url('#')}}">Tampilkan</a></td>
						<td class="text-center"><a href="{{url('#')}}">Tampilkan</a></td>
						<td class="text-center"><a href="{{url('#')}}">Tampilkan</a></td>
						
					</tr>
					@empty
					@endforelse
				</tbody>
			</table>

		</div>
	</div>

</div>
</div>

@endsection
@section('javascript')
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
	});
</script>

@endsection


