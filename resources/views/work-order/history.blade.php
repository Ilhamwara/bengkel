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
				<span>History WO</span>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h3 class="page-title"><b>History WO</b></h3>
	<br>
	<div class="row">
		<div class="col-md-12">
		<div class="portlet light bordered">
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
						<thead>
							<tr><th class="text-center">No</th>
						<th class="text-center">No WO</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">Detail</th>
					</tr>
				</thead>
				<?php $i = 0 ?>
				<tbody>@forelse($orders as $history)
					<?php $i++ ?>
					<tr>
						<td>{{$i}}</td>
						<td class="text-center">{{$history->no_wo}}</td>
						<td class="text-center">{{$history->nama}}</td>
						<td class="text-center"><a href={{url('#')}}>detail</a></td>
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



