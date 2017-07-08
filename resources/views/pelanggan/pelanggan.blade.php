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
				<span>Data Pelanggan</span>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h3 class="page-title"><b>Data Pelanggan</b></h3>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light bordered">
				
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">ID</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Alamat</th>
								<th class="text-center">No Polisi</th>
								<th class="text-center">Telp</th>
								<th class="text-center">Type</th>
								<th class="text-center">Noka/Nosin</th>
								<th class="text-center">Warna</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<?php $i = 0 ?>
						<tbody>
							@forelse($pelanggans as $pelanggan)
							<?php $i++ ?>
							<tr>
								<td>{{$i}}</td>
								<td class="text-center">{{$pelanggan->id_pelanggan}}</td>
								<td class="text-center">{{$pelanggan->nama}}</td>
								<td class="text-center">{{$pelanggan->alamat}}</td>
								<td class="text-center">{{$pelanggan->no_pol}}</td>
								<td class="text-center">{{$pelanggan->telepon}}</td>
								<td class="text-center">{{$pelanggan->tipe}}</td>
								<td class="text-center">{{$pelanggan->noka_nosin}}</td>
								<td class="text-center">{{$pelanggan->warna}}</td>
								<td class="text-center">
									<ul class="action">
										<li><a href="{{url('edit/pelanggan/'.$pelanggan->id)}}" class="btn btn-warning"  data-toggle="tooltip" title="Edit" style="padding: 6px 12px;"><i class="fa fa-pencil"></i></a></li>
										<li><a href="{{url('hapus/pelanggan/'.$pelanggan->id)}}" class="btn btn-danger"  data-toggle="tooltip" title="Hapus" style="padding: 6px 12px;"><i class="fa fa-trash-o"></i></a></li>
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