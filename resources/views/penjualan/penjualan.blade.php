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
				<span>Data Penjualan Sparepart</span>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h3 class="page-title"><b>Data Penjualan Sparepart</b></h3>
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
								<th class="text-center">No Nota</th>
								<th class="text-center">Tgl Nota</th>
								<th class="text-center">No BKB</th>
								<th class="text-center">No Pol</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Kode</th>
								<th class="text-center">Alamat</th>
								<th class="text-center">Kota</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						
						<tbody>
							@forelse($penjualans as $i => $penjualan)
							
							<tr>
								<td>{{$i+1}}</td>
								<td class="text-center">{{$penjualan->no_nota}}</td>
								<td class="text-center">{{$penjualan->tgl_nota}}</td>
								<td class="text-center">{{$penjualan->no_bkb}}</td>
								<td class="text-center">{{$penjualan->no_pol}}</td>
								<td class="text-center">{{$penjualan->nama}}</td>
								<td class="text-center">{{$penjualan->kode}}</td>
								<td class="text-center">{{$penjualan->alamat}}</td>
								<td class="text-center">{{$penjualan->kota}}</td>
								<td class="text-center">
									<ul class="action">
										<li><a href="{{url('detail/penjualan/'.$penjualan->id)}}" class="btn btn-warning"  data-toggle="tooltip" title="Detail" style="padding: 6px 12px;"><i class="fa fa-eye"></i></a></li>
										<li><a href="{{url('hapus/penjualan/'.$penjualan->id)}}" class="btn btn-danger"  data-toggle="tooltip" title="Hapus" style="padding: 6px 12px;"><i class="fa fa-trash-o"></i></a></li>
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