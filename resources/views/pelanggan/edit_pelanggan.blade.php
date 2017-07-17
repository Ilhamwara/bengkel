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
			
			<form action="{{url('editpost/pelanggan/' .$pelanggan->id) }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				<div class="form-group">
					<label class="col-sm-2 control-label text-left">ID</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nama" name="id_pelanggan" value="{{$pelanggan->id_pelanggan}}" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Nama</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nid" name="nama" value="{{$pelanggan->nama}}" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Alamat</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="jabatan" name="Alamat" value="{{$pelanggan->alamat}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Nopol</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="no_pol" name="grade" value="{{$pelanggan->no_pol}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Telepon</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="telepon" name="telepon" value="{{$pelanggan->telepon}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Tipe</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="tipe" name="tipe" value="{{$pelanggan->tipe}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Noka/ Nosin</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="noka_nosin" name="noka_nosin" value="{{$pelanggan->noka_nosin}}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Warna</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="noka_nosin" name="warna" value="{{$pelanggan->warna}}">
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
