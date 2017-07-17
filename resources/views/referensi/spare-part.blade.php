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
				<span>Data Sparepart</span>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h3 class="page-title"><b>Data Sparepart</b></h3>
	<br>
	<div class="row">
		<div class="col-md-12">
			<a href="{{url('sparepart/tambah-sparepart')}}" class="btn btn-success" style="padding: 6px 12px; margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>
			<div class="portlet light bordered">
				
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">No Part</th>
								<th class="text-center">Nama Part</th>
								<th class="text-center">Harga Beli</th>
								<th class="text-center">Harga Jual</th>
								<th class="text-center">Stok</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<?php $i = 0 ?>
						<tbody>
							@forelse($spareparts as $sparepart)
							<?php $i++ ?>
							<tr>
								<td>{{$i}}</td>
								<td class="text-center">{{$sparepart->no}}</td>
								<td class="text-center">{{$sparepart->nama}}</td>
								<td class="text-center">{{$sparepart->harga_beli}}</td>
								<td class="text-center">{{$sparepart->harga_jual}}</td>
								<td class="text-center">{{$sparepart->stok}}</td>
								<td class="text-center">
									@if($sparepart->stok > 0)
									<ul class="action">
										<li><a href="{{url('sparepart/'.$sparepart->id.'/edit')}}" class="btn btn-warning"  data-toggle="tooltip" title="Edit" style="padding: 6px 12px;"><i class="fa fa-pencil"></i></a></li>
										<li><a href="{{url('hapus/sparepart/'.$sparepart->id)}}" class="btn btn-danger"  data-toggle="tooltip" title="Hapus" style="padding: 6px 12px;"><i class="fa fa-trash-o"></i></a></li>
									</ul>
									@else
									<a href="{{url('buat-purchase-order')}}" class="btn btn-primary">Buat Order</a>
									@endif
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