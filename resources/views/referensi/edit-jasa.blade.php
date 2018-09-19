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
				<span>Edit Jasa</span>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h3 class="page-title"><b>Edit Jasa</b></h3>
	<br>
	<div class="row">
		<div class="col-md-12">
			
			<form action="{{url('jasa/' .$jasa->id. '/editpost') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				<div class="form-group">
					<label class="col-sm-2 control-label">Jasa</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nama_jasa" name="nama_jasa" value="{{$jasa->nama_jasa}}" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Harga per FR</label>
					<div class="col-sm-6"><div class="input-group">
                            <span class="input-group-addon">Rp</span>
						<input type="text" class="form-control" id="harga_perfr" name="harga_perfr" value="{{$jasa->harga_perfr}}" style="text-align: right;">
						</div>
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
