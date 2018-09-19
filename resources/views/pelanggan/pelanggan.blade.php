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
		padding-left: 0!important;
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
			<!-- <a data-toggle="modal" data-target="#myModal" class="btn btn-success" style="padding: 6px 12px; margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a> -->
			@include('include.alert')
			<div class="portlet light bordered">
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
						<thead>
							<tr>
								<th class="text-center">No</th>
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
										<li><a href="{{url('buat-order/'.$pelanggan->id)}}" class="btn btn-success"  data-toggle="tooltip" title="Buat Work Order" style="padding: 6px 12px;"><i class="fa fa-file-text-o"></i></a></li>
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

	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tambah Pelanggan</h4>
				</div>
				<div class="modal-body">
					<form action="{{url('post-pelanggan')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
						{{ csrf_field() }}
						<div class="form-group">
							<label class="col-sm-2 control-label text-left">Id Pelanggan</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="id_pelanggan" placeholder="Id Pelanggan" required> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label text-left">Nama Pelanggan</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="nama" placeholder="Nama" required> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label text-left">Alamat</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label text-left">Nopol</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="no_pol" placeholder="Nopol" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label text-left">Telepon</label>
							<div class="col-sm-6">
								<input type="text" maxlength='15' onblur="checkNum($(this))" class="form-control" name="telepon" placeholder="Telepon" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label text-left">Tipe</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="tipe" placeholder="Tipe" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label text-left">Noka/Nosin</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="noka_nosin" placeholder="Noka/ Nosin" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label text-left">Warna</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="warna" placeholder="Warna" required>
							</div>
						</div>
						<input type="hidden" value="{{ 'csrf_token' }}" name="token">
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Simpan</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</form>
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