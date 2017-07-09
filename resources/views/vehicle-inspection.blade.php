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
            <div class="col-sm-12" style="margin-bottom: 10px;">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-4 text-left">Pilih WO</label>
                        <div class="col-sm-6">
                         <select name="workorder" class="form-control" id ="select2">
                             <option value=""></option>
                             @foreach($workorder as $data)
                             <option value="{{$data->pelanggan_id}}" data-nama="{{$data->nama}}" data-alamat="{{$data->alamat}}" data-nopol="{{$data->no_pol}}" data-telepon="{{$data->telepon}}" data-tipe="{{$data->tipe}}" data-nokanosin="{{$data->noka_nosin}}" data-warna="{{$data->warna}}" data-km="{{$data->km_datang}}" data-fuel="{{$data->fuel_datang}}" data-tanggal="{{$data->tanggal}}">{{$data->no_wo}}</option>
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
                        <input type="text" class="form-control" name="tanggal" id="data_tanggal" disabled>
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
                    <tr>
                        <th class="bg-primary" colspan="14">Dokumen Kendaraan</th>
                    </tr>
                    <tr>
                        <td class="">1</td>
                        <td class="">STNK</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="" rowspan="2"></td>
                        <td class="">3</td>
                        <td class="">KIR</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="" rowspan="2"></td>
                        <td class="">5</td>
                        <td class="">BUKU MANUAL</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">2</td>
                        <td class="">BPKB</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">4</td>
                        <td class="">BUKU SERVICE</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">6</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <th class="bg-primary" colspan="14">Fungsi Aksesoris Bagian Dalam</th>
                    </tr>
                    <tr>
                        <td class="">1</td>
                        <td class="">AC</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="" rowspan="9"></td>
                        <td class="">10</td>
                        <td class="">CENTRAL LOCK</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="" rowspan="9"></td>
                        <td class="">19</td>
                        <td class="">PANEL WIPER</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">2</td>
                        <td class="">ELECTRIC MIROR</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">11</td>
                        <td class="">POWER WINDOW</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">20</td>
                        <td class="">PANEL LAMP</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">3</td>
                        <td class="">AUDIO</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">12</td>
                        <td class="">HANDLE WINDOW</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">21</td>
                        <td class="">PANEL LACI</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">4</td>
                        <td class="">KLAKSON</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">13</td>
                        <td class="">PEMATIK ROKOK</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">22</td>
                        <td class="">PANEL PINTU</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">5</td>
                        <td class="">LAMPU SIRINE</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">14</td>
                        <td class="">SUN RUF</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">23</td>
                        <td class="">PANEL FUEL</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">6</td>
                        <td class="">HAND BRAKE</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">15</td>
                        <td class="">LAMPU CABINE</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">24</td>
                        <td class="">PANEL ENGINE CUP</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">7</td>
                        <td class="">HANDLE FUEL CUP</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">16</td>
                        <td class="">KARET</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">25</td>
                        <td class="">PANEL BAGASI</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">8</td>
                        <td class="">SABUK PENGAMAN</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">17</td>
                        <td class="">SPION CABINE</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">26</td>
                        <td class="">PANEL JOK</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">9</td>
                        <td class="">HT RADIO</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">18</td>
                        <td class="">MONITOR GPS</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">27</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <th class="bg-primary" colspan="14">Fungsi Aksesoris Bagian Luar</th>
                    </tr>
                    <tr>
                        <td class="">1</td>
                        <td class="">ENGINE CUP</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="" rowspan="7"></td>
                        <td class="">8</td>
                        <td class="">HANDLE PINTU</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="" rowspan="7"></td>
                        <td class="">15</td>
                        <td class="">KACA PINTU FRN/RH</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">2</td>
                        <td class="">BEMPER DEPAN</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">8</td>
                        <td class="">HANDLE BAGASI</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">16</td>
                        <td class="">KACA PINTU FR/LH</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">3</td>
                        <td class="">BEMPER BERLAKANG</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">10</td>
                        <td class="">DOF RODA</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">17</td>
                        <td class="">KACA PINTU FRN/RH</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">4</td>
                        <td class="">KACA FELM</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">11</td>
                        <td class="">TUTUP BAN SEREP</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">18</td>
                        <td class="">KACA PINTU RR/RH</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">5</td>
                        <td class="">KACA DEPAN</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">12</td>
                        <td class="">KACA DEPAN</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">19</td>
                        <td class="">KACA PINTU RR/LH</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">6</td>
                        <td class="">FUEL CUP</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">13</td>
                        <td class="">KACA BELAKANG</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">20</td>
                        <td class="">KACA SPION</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class="">7</td>
                        <td class="">TALANG AIR</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">14</td>
                        <td class="">ANTENA</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">21</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <th class="bg-primary" colspan="14">Perlengkapan Kendaraan</th>
                    </tr>
                    <tr>
                        <td class="">1</td>
                        <td class="">DONGKRAK</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="" rowspan="2"></td>
                        <td class="">3</td>
                        <td class="">REMOTE KUNCI</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="" rowspan="2"></td>
                        <td class="">5</td>
                        <td class="">PERKAKAS KUNCI</td>
                        <td style="background: #2ecc71; color: #fff;">
                            <div class="text-center">
                                <input type="radio" name="radio" id="radio2" value="2" class="form-control">
                                <label for="radio2"><span class="box"></span></label>
                            </div>
                        </td>
                        <td class="bg-red">
                            <div class="text-center">
                                <input type="radio" name="radio" id="radio2" value="2" class="form-control">
                                <label for="radio2"><span class="box"></span></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="">2</td>
                        <td class="">HANDLE DONGKRAK</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">4</td>
                        <td class="">BAN SEREP</td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class="">6</td>
                        <td class="">KUNCI</td>
                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                </table>
           </div>
    </div>

   <div class="col-sm-offset-1 col-sm-10">
        <h4>Kondisi Body Luar Kendaraan</h4>
        <div class="form-group">
            <label>Foto 1</label>
            <input type="file" class="form-control" name="foto1">
            <label>Foto 2</label>
            <input type="file" class="form-control" name="foto2">
           <label>Keterangan</label> 
          <textarea class="form-control" name="keterangan"></textarea>  
        </div>     
    </div>

    <input type="hidden" value="{{ 'csrf_token' }}" name="token">
    <div class="form-group">
        <div class="col-sm-offset-1 col-sm-10">
          <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
  </div>
</form>

</div>
</div>
@endsection
@section('js')
<script src="{{asset('recources/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
});
</script>
<script>$('#select2').change(function(){
    var
    value = $(this).val(),
    $obj = $('#select2 option[value="'+value+'"]'),
    nama = $obj.attr('data-nama'),
    alamat = $obj.attr('data-alamat');
    nopol = $obj.attr('data-nopol'),
    telepon = $obj.attr('data-telepon');
    tipe = $obj.attr('data-tipe'),
    nokanosin = $obj.attr('data-nokanosin');
    warna = $obj.attr('data-warna'),
    km = $obj.attr('data-km'),
    fuel = $obj.attr('data-fuel');
    tanggal = $obj.attr('data-tanggal'),
    
    
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
@endsection
