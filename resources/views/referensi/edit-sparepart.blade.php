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
				<span>Edit Sparepart</span>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h3 class="page-title"><b>Edit Sparepart</b></h3>
	<br>
	<div class="row">
		<div class="col-md-12">
			
			<form action="{{url('sparepart/' .$sparepart->id. '/editpost') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				<div class="form-group">
				<label class="col-sm-2 control-label">No Part</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="no" name="no" value="{{$sparepart->no}}" >
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Nama Part</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nama" name="nama" value="{{$sparepart->nama}}" >
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Harga Beli</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="harga_beli" name="harga_beli" value="{{$sparepart->harga_beli}}" >
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Harga Jual</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="harga_jual" name="harga_jual" value="{{$sparepart->harga_jual}}" >
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-2 control-label">Stok</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="stok" name="stok" value="{{$sparepart->stok}}" >
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
