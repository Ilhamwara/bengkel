@extends('layouts.master')
@section('css')
@endsection
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Detail Vehicle Inspection</span>
            </li>
        </ul>
    </div>

    <h3 class="page-title"><b>Detail Vehicle Inspection</b></h3>
    <br>
    <div class="row">
       <form action="{{url('vehicle-inspection/cetak-inspection/' .$wo->no_wo)}}" method="GET" class="form-horizontal" style="overflow: hidden;">
        {{ csrf_field() }}
        @include('include.alert')
        <div class="col-sm-12" style="margin-bottom: 10px;">
            <div class="col-sm-6">

                <div class="form-group">
                    <label class="col-sm-4 text-left">No WO</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" min="0" name="nama" value="{{$wo->no_wo}}" readonly> 
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 text-left">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" min="0" name="nama" value="{{$wo->nama_pelanggan}}" readonly> 
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 text-left">Alamat</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="alamat" value="{{$wo->alamat}}" readonly> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 text-left">No. Pol</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="no_pol" value="{{$wo->no_pol}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 text-left">Telepon</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="telepon" value="{{$wo->telepon}}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 text-left">Tanggal</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="tgl" value="{{$inspection->tgl}}" readonly>
                    </div>
                </div>

            </div>

            <div class="col-sm-6">

                <div class="form-group">
                    <label class="col-sm-4 text-left">Type</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="tipe" value="{{$wo->tipe}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 text-left">Noka/ Nosin</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="noka_nosin" value="{{$wo->noka_nosin}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 text-left">Warna</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="warna" value="{{$wo->warna}}" readonly>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-4 text-left">Km Datang</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="km_datang" value="{{$wo->km_datang}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 text-left">Fuel Datang</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="fuel_datang" value="{{$wo->fuel_datang}}" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <br><br>
            <div class="table-responsive">
             <table class="table table-striped table-bordered table-hover table-checkable order-column">
                <tr>
                    <th class="text-center bg-primary">No</th>
                    <th class="text-center bg-primary">Type</th>
                    <th class="text-center bg-primary">Nama</th>
                </tr>
                @foreach($inspections as $k => $data)                
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$data->type}}</td>
                    <td>{{$data->nama}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="col-sm-offset-1 col-sm-10">
        <h4><b>Kondisi Body Luar Kendaraan</b></h4>
        <br>
        @forelse($foto as $data_foto)
        <div class="col-md-4">
            <img src="{{url('storage/uploads/img/'.$data_foto->img)}}" class="img-responsive">
        </div>
        @empty
        @endforelse  
    </div>
    <div class="col-sm-offset-1 col-sm-10">
        <div class="form-group">
            <br><br>
            <label><b>Keterangan</b></label> 
            <textarea class="form-control" id="deskripsi" name="keterangan">{!! $inspect[0]->keterangan !!}</textarea>  
        </div> 
    </div>  
    <div class="form-group">
        <div class="col-sm-offset-1 col-sm-10">
          <button class="btn btn-primary">Cetak</button>
      </div>
  </div>
</form>

</div>
</div>
@endsection
@section('js')
<script src="{{asset('js/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'deskripsi',
    {
        customConfig : '',
        toolbar : 'simple'
    })
</script>
@endsection
