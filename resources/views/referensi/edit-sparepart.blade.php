@extends('layouts.app')

<style>

	.control-label{text-align: left!important;}
</style>

@section('content')

<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-12">
			<h3>Edit Sparepart</h3>
			<br/>
			
			<form action="{{url('sparepart/' .$sparepart->id. '/editpost') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				<div class="form-group">
				<label class="col-sm-4 control-label">No Part</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="no" name="no" value="{{$sparepart->no}}" >
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Nama Part</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="nama" name="nama" value="{{$sparepart->nama}}" >
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Harga Beli</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="harga_beli" name="harga_beli" value="{{$sparepart->harga_beli}}" >
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Harga Jual</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="harga_jual" name="harga_jual" value="{{$sparepart->harga_jual}}" >
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-4 control-label">Stok</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="stok" name="stok" value="{{$sparepart->stok}}" >
					</div>
				</div>
				<input type="submit" class="btn btn-success pull-right" value="Simpan">
			</form>
		</div>
	</div>
</div>

@endsection
