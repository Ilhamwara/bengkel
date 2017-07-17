@extends('layouts.master')
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Tambah User</span>
            </li>
        </ul>
    </div>

    <h3 class="page-title"><b>Tambah User</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
        @include('include.alert')
            <form action="{{url('tambah/user/')}}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" required> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" placeholder="Masukan Email" required> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left">Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password"> 
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
