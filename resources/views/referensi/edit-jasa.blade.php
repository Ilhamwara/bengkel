@extends('layouts.app')

<style>

	.control-label{text-align: left!important;}
</style>

@section('content')

<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-12">
			<h3>Edit Jasa</h3>
			<br/>
			
			<form action="{{url('jasa/' .$jasa->id. '/editpost') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				<div class="form-group">
				<label class="col-sm-4 control-label">Jasa</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="nama_jasa" name="nama_jasa" value="{{$jasa->nama_jasa}}" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Harga per FR</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="harga_perfr" name="harga_perfr" value="{{$jasa->harga_perfr}}" >
					</div>
				</div>
				<input type="submit" class="btn btn-success pull-right" value="Simpan">
			</form>
		</div>
	</div>
</div>

@endsection
