
@extends('layouts.master')
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Tambah Jasa</span>
            </li>
        </ul>
    </div>

<h3 class="page-title"><b>Tambah Jasa</b></h3>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('post-jasa')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                 <div class="form-group">
                    <label class="col-sm-2 control-label">Jasa</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama_jasa" placeholder="Nama Jasa" required> 
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label">Harga per FR</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="harga_perfr" placeholder="Harga per RF" required> 
                    </div>
                </div>
               
            <input type="hidden" value="{{ 'csrf_token' }}" name="token">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
        </form>
    </div>
</div>

@endsection
