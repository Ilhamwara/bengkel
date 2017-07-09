@extends('layouts.master')
@section('css')
<link href="{{asset('recources/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('recources/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />       
@endsection
@section('content')
<div class="page-content">
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
			</li>
			<li>
				<span>Edit Pelanggan</span>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h3 class="page-title"><b>Edit Pelanggan</b></h3>
	<br>
	<div class="row">
		<div class="col-md-12">
			
			<form action="{{url('supplier/' .$supplier->id. '/editpost') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				<div class="form-group">
					<label class="col-sm-2 control-label text-left">ID</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="id_supplier" name="id_supplier" value="{{$supplier->id_supplier}}" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Nama</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nama" name="nama" value="{{$supplier->nama}}" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Alamat</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="alamat" name="alamat" value="{{$supplier->alamat}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">No Rek</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="no_rek" name="grade" value="{{$supplier->no_rek}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Kontak</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="kontak" name="kontak" value="{{$supplier->kontak}}">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
