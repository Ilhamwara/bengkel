
@extends('layouts.master')
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Tambah Vehicle</span>
            </li>
        </ul>
    </div>

<h3 class="page-title"><b>Tambah Vehicle</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
        @include('include.alert')
            <form action="{{url('tambah-vehicle')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                   <label class="col-sm-2 control-label text-left">Tipe</label>
                    <div class="col-sm-6">
                        <select name="tipe" class="form-control" required>
                            <option value="Dokumen Kendaraan">Dokumen Kendaraan</option>
                            <option value="Fungsi Aksesoris Bagian Dalam">Fungsi Aksesoris Bagian Dalam</option>
                            <option value="Fungsi Aksesoris Bagian Luar">Fungsi Aksesoris Bagian Luar</option>
                            <option value="Perlengkapan Kendaraan">Perlengkapan Kendaraan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" required> 
                    </div>
                </div>
                <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button class="btn btn-primary">Simpan</button>
                </div>
              </div>
        </form>
    </div>
</div>

@endsection
