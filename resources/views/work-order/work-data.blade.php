@extends('layouts.app')

@section('css_styles')
<link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<style>
	div.dataTables_wrapper div.dataTables_paginate{cursor: pointer;}
	.paginate_button{
		padding: 0 5px;
	}
	.dt-button{
		padding: 5px 15px;
		border-radius: 5px;
		float: left;
		background: #3097D1;
		color: #fff;
	}
</style>
@endsection
@section('content')

<div class="panel panel-default ">
	<div class="panel-heading"><h3>Work Data</h3></div>
	<div class="panel-body">
		<a href="{{url('work-data/buat-order')}}" class="btn btn-success" style="padding: 6px 12px; margin-bottom: 20px;"><i class="fa fa-plus"></i>Buat Work Order</a>
		<a href="{{url('vehicle-inspection/buat-vehicle-inspection')}}" class="btn btn-success" style="padding: 6px 12px; margin-bottom: 20px;"><i class="fa fa-plus"></i>Buat Vehicle Inspection</a>
		<a href="{{url('estimasi-biaya/buat-estimasi-biaya')}}" class="btn btn-success" style="padding: 6px 12px; margin-bottom: 20px;"><i class="fa fa-plus"></i>Buat Estimasi Biaya</a>
		<div class="table-responsive">
			<table id="jasa" class="table table-striped table-bordered " cellspacing="0" width="100%">
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
						<td class="names">{{$order->no}}</td>
						<td class="text-center">{{$order->nama}}</td>
						<td class="names">{{$order->work}}</td>
						<td class="text-center">{{$order->vehicle}}</td>
						<td class="names">{{$order->nota}}</td>
						<td class="text-center">{{$order->estimasi}}</td>
						
					</tr>
					@empty
					@endforelse
				</tbody>
			</table>

		</div>
	</div>

</div>

@endsection
@section('javascript')
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
	});

	$(document).ready(function() {
		$('#pelanggan').DataTable();
	} );
</script>



<script src="{{asset('js/jquery-1.12.4.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

@endsection



