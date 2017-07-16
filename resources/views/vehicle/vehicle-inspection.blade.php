@extends('layouts.master')
@section('css')
<link href="{{asset('recources/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('recources/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-content">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Buat Order Work</span>
            </li>
        </ul>
    </div>

    <h3 class="page-title"><b>Buat Vehicle Inspection</b></h3>
    <br>
    <div class="row">
        <form action="{{url('post-inspection')}}" method="POST" enctype="multipart/form-data" class="form-horizontal" style="overflow: hidden;">
            {{ csrf_field() }}
            @include('include.alert')
            <div class="col-sm-12" style="margin-bottom: 10px;">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-4 text-left">Pilih WO</label>
                        <div class="col-sm-6">
                         <select name="workorder" class="select2 form-control" id ="select2" required>
                             <option value="">Pilih WO</option>
                             @foreach($workorder as $data)
                             <option value="{{$data->id}}" data-nama="{{$data->nama}}" data-alamat="{{$data->alamat}}" data-nopol="{{$data->no_pol}}" data-telepon="{{$data->telepon}}" data-tipe="{{$data->tipe}}" data-nokanosin="{{$data->noka_nosin}}" data-warna="{{$data->warna}}" data-km="{{$data->km_datang}}" data-fuel="{{$data->fuel_datang}}" data-tanggal="{{$data->tanggal}}">{{$data->no_wo}}</option>
                             @endforeach
                         </select>
                     </div>
                 </div>

                 <div class="form-group">
                    <label class="col-sm-4 text-left">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" min="0" name="nama" id="data_nama" disabled> 
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 text-left">Alamat</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="alamat" id="data_alamat" disabled> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 text-left">No. Pol</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="no_pol" id="data_nopol" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 text-left">Telepon</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="telepon" id="data_telepon" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 text-left">Tanggal</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="tgl" id="data_tanggal">
                    </div>
                </div>

            </div>

            <div class="col-sm-6">

                <div class="form-group">
                    <label class="col-sm-4 text-left">Type</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="tipe" id="data_tipe" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 text-left">Noka/ Nosin</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="noka_nosin" id="data_nokanosin" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 text-left">Warna</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="warna" id="data_warna" disabled>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-4 text-left">Km Datang</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="km_datang" id="data_km" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 text-left">Fuel Datang</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="fuel_datang" id="data_fuel" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
        <br><br>
           <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">

                    @if($vecdok[0]->type == 'Dokumen Kendaraan')
                        <tr>
                            <th class="bg-primary" colspan="4">Dokumen Kendaraan</th>
                        </tr>
                    @endif
                    @foreach($vecdok as $a => $dok)
                        <tr>
                            <td class=""><b>{{$a+1}}</b></td>
                            <td class="">{{$dok->nama}}</td>
                            <td>
                                <div class="text-center">
                                    <input type="checkbox" name="tipe[]" value="{{$dok->id}}" class="form-control">
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if($vecdalam[0]->type == 'Fungsi Aksesoris Bagian Dalam')
                        <tr>
                            <th class="bg-primary" colspan="4">Fungsi Aksesoris Bagian Dalam</th>
                        </tr>
                    @endif
                    @foreach($vecdalam as $b => $dal)
                        <tr>
                            <td class=""><b>{{$b+1}}</b></td>
                            <td class="">{{$dal->nama}}</td>
                            <td>
                                <div class="text-center">
                                    <input type="checkbox" name="tipe[]" value="{{$dal->id}}" class="form-control">
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if($vecluar[0]->type == 'Fungsi Aksesoris Bagian Luar')
                        <tr>
                            <th class="bg-primary" colspan="4">Fungsi Aksesoris Bagian Luar</th>
                        </tr>
                    @endif
                    @foreach($vecluar as $c => $luar)
                        <tr>
                            <td class=""><b>{{$c+1}}</b></td>
                            <td class="">{{$luar->nama}}</td>
                            <td>
                                <div class="text-center">
                                    <input type="checkbox" name="tipe[]" value="{{$luar->id}}" class="form-control">
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if($vecperl[0]->type == 'Perlengkapan Kendaraan')
                        <tr>
                            <th class="bg-primary" colspan="4">Perlengkapan Kendaraan</th>
                        </tr>
                    @endif
                    @foreach($vecperl as $d => $perl)
                        <tr>
                            <td class=""><b>{{$d+1}}</b></td>
                            <td class="">{{$perl->nama}}</td>
                            <td>
                                <div class="text-center">
                                    <input type="checkbox" name="tipe[]" value="{{$perl->id}}" class="form-control">
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </table>
           </div>
    </div>

   <div class="col-sm-offset-1 col-sm-10">
        <h4><b>Kondisi Body Luar Kendaraan</b></h4>
        <br>
        <div class="form-group">
            <a onclick="tambah()" class="btn btn-warning">Tambah Foto</a>
        </div>
        <div class="form-group">
            <label><b>Foto</b></label>
        </div>
        <div class="form-group" id="field-baru">
            <input type="file" class="form-control" name="foto[]" required>
        </div>
        <div class="form-group">
            <label><b>Keterangan</b></label> 
            <textarea class="form-control" id="deskripsi" name="keterangan"></textarea>  
        </div>     
    </div>
    <div class="form-group">
        <div class="col-sm-offset-1 col-sm-10">
          <button class="btn btn-primary">Simpan</button>
      </div>
  </div>
</form>

</div>
</div>
@endsection
@section('js')
<script src="{{asset('recources/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/ckeditor.js')}}"></script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
});
</script>
<script>$('#select2').change(function(){
    var
    value       = $(this).val(),
    $obj        = $('#select2 option[value="'+value+'"]'),
    nama        = $obj.attr('data-nama'),
    alamat      = $obj.attr('data-alamat');
    nopol       = $obj.attr('data-nopol'),
    telepon     = $obj.attr('data-telepon');
    tipe        = $obj.attr('data-tipe'),
    nokanosin   = $obj.attr('data-nokanosin');
    warna       = $obj.attr('data-warna'),
    km          = $obj.attr('data-km'),
    fuel        = $obj.attr('data-fuel');
    tanggal     = $obj.attr('data-tanggal'),
    
    
    $('#data_nama').val(nama);
    $('#data_alamat').val(alamat);
    $('#data_nopol').val(nopol);
    $('#data_telepon').val(telepon);
    $('#data_tipe').val(tipe);
    $('#data_nokanosin').val(nokanosin);
    $('#data_warna').val(warna);
    $('#data_km').val(km);
    $('#data_fuel').val(fuel);
    $('#data_tanggal').val(tanggal);

});
</script>
<script>
    CKEDITOR.replace( 'deskripsi',
    {
        customConfig : '',
        toolbar : 'simple'
    })
</script>
@endsection
