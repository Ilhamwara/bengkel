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
				<span>DetailPenjualan Sparepart</span>
			</li>
		</ul>
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h3 class="page-title"><b>Detail Penjualan Sparepart</b></h3>
	<br>
	<div class="row">
		<div class="col-md-12">
			
			<form action="{{url('penjualan/cetak-penjualan/' .$penjualan->id) }}" method="GET" class="form-horizontal">
				{{ csrf_field() }}

				<div class="form-group">
					<label class="col-sm-2 control-label text-left">No Nota</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nama" name="no_nota" value="{{$penjualan->no_nota}}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Tgl Nota</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nid" name="tgl_nota" value="{{$penjualan->tgl_nota}}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">No BKB</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="jabatan" name="no_bkb" value="{{$penjualan->no_bkb}}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">No Pol</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="no_pol" name="no_pol" value="{{$penjualan->no_pol}}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Nama</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="telepon" name="nama" value="{{$penjualan->nama}}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Kode</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="tipe" name="kode" value="{{$penjualan->kode}}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Alamat</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="noka_nosin" name="alamat" value="{{$penjualan->alamat}}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label text-left">Kota</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="noka_nosin" name="kota" value="{{$penjualan->kota}}" readonly>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="portlet light bordered">
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Nama Part</th>
								<th class="text-center">No Part</th>
								<th class="text-center">Qty</th>
								<th class="text-center">Harga Satuan</th>
								<th class="text-center">Jumlah</th>
							</tr>
							@foreach($penj_part as $k => $data)
							<tr>
								<td class="text-center">{{$k+1}}</td>
								<td class="text-center">{{$data->nama_part}}</td>
								<td class="text-center">{{$data->no_part}}</td>
								<td class="text-center">{{$data->qty}}</td>
								<td class="text-center"> <div class="input-group">
									<span class="input-group-addon">Rp</span><input type="text" class="form-control" value="{{number_format($data->harga_jual)}}" readonly style="text-align: right;"></div></td>
									<td class="text-center"> <div class="input-group">
									<span class="input-group-addon">Rp</span><input type="text" class="form-control" value="{{number_format($data->jumlah)}}" readonly style="text-align: right;"></div></td>
									</tr>
									@endforeach
									<td class="text-center" colspan="4"></td>
									<td class="text-center">Total</td>
									<td class="text-center"> <div class="input-group">
										<span class="input-group-addon">Rp</span></span><input type="text" class="form-control" value="{{number_format($data->sum('jumlah'))}}" readonly style="text-align: right;"></div></td>
									</table>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-1 col-sm-10">
								<button type="submit" class="btn btn-primary">Cetak</button>
							</div>
						</div>
					</form>

				</div>
			</div>

			@endsection
