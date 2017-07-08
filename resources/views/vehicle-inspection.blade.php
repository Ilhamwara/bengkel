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
        <form action="{{url('post-inspection')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <div class="col-sm-11 col-sm-offset-1" style="margin-bottom: 10px;">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pilih WO</label>
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
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" min="0" name="nama" id="data_nama" disabled> 
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="alamat" id="data_alamat" disabled> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">No. Pol</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="no_pol" id="data_nopol" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Telepon</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="telepon" id="data_telepon" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="tanggal" id="data_tanggal" disabled>
                    </div>
                </div>

            </div>

            <div class="col-sm-6">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="tipe" id="data_tipe" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Noka/ Nosin</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="noka_nosin" id="data_nokanosin" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Warna</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="warna" id="data_warna" disabled>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label">Km Datang</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="km_datang" id="data_km" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Fuel Datang</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="fuel_datang" id="data_fuel" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
           <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
              <tr>
                <th class="tg-031e" colspan="14">Dokumen Kendaraan</th>
            </tr>
            <tr>
                <td class="tg-yw4l">1</td>
                <td class="tg-yw4l">STNK</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l" rowspan="2"></td>
                <td class="tg-yw4l">3</td>
                <td class="tg-yw4l">KIR</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l" rowspan="2"></td>
                <td class="tg-yw4l">5</td>
                <td class="tg-yw4l">BUKU MANUAL</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">2</td>
                <td class="tg-yw4l">BPKB</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">4</td>
                <td class="tg-yw4l">BUKU SERVICE</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">6</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <th class="tg-yw4l" colspan="14">Fungsi Aksesoris Bagian Dalam</th>
            </tr>
            <tr>
                <td class="tg-yw4l">1</td>
                <td class="tg-yw4l">AC</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l" rowspan="9"></td>
                <td class="tg-yw4l">10</td>
                <td class="tg-yw4l">CENTRAL LOCK</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l" rowspan="9"></td>
                <td class="tg-yw4l">19</td>
                <td class="tg-yw4l">PANEL WIPER</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">2</td>
                <td class="tg-yw4l">ELECTRIC MIROR</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">11</td>
                <td class="tg-yw4l">POWER WINDOW</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">20</td>
                <td class="tg-yw4l">PANEL LAMP</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">3</td>
                <td class="tg-yw4l">AUDIO</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">12</td>
                <td class="tg-yw4l">HANDLE WINDOW</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">21</td>
                <td class="tg-yw4l">PANEL LACI</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">4</td>
                <td class="tg-yw4l">KLAKSON</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">13</td>
                <td class="tg-yw4l">PEMATIK ROKOK</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">22</td>
                <td class="tg-yw4l">PANEL PINTU</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">5</td>
                <td class="tg-yw4l">LAMPU SIRINE</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">14</td>
                <td class="tg-yw4l">SUN RUF</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">23</td>
                <td class="tg-yw4l">PANEL FUEL</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">6</td>
                <td class="tg-yw4l">HAND BRAKE</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">15</td>
                <td class="tg-yw4l">LAMPU CABINE</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">24</td>
                <td class="tg-yw4l">PANEL ENGINE CUP</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">7</td>
                <td class="tg-yw4l">HANDLE FUEL CUP</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">16</td>
                <td class="tg-yw4l">KARET</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">25</td>
                <td class="tg-yw4l">PANEL BAGASI</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">8</td>
                <td class="tg-yw4l">SABUK PENGAMAN</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">17</td>
                <td class="tg-yw4l">SPION CABINE</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">26</td>
                <td class="tg-yw4l">PANEL JOK</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">9</td>
                <td class="tg-yw4l">HT RADIO</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">18</td>
                <td class="tg-yw4l">MONITOR GPS</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">27</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <th class="tg-yw4l" colspan="14">Fungsi Aksesoris Bagian Luar</th>
            </tr>
            <tr>
                <td class="tg-yw4l">1</td>
                <td class="tg-yw4l">ENGINE CUP</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l" rowspan="7"></td>
                <td class="tg-yw4l">8</td>
                <td class="tg-yw4l">HANDLE PINTU</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l" rowspan="7"></td>
                <td class="tg-yw4l">15</td>
                <td class="tg-yw4l">KACA PINTU FRN/RH</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">2</td>
                <td class="tg-yw4l">BEMPER DEPAN</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">8</td>
                <td class="tg-yw4l">HANDLE BAGASI</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">16</td>
                <td class="tg-yw4l">KACA PINTU FR/LH</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">3</td>
                <td class="tg-yw4l">BEMPER BERLAKANG</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">10</td>
                <td class="tg-yw4l">DOF RODA</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">17</td>
                <td class="tg-yw4l">KACA PINTU FRN/RH</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">4</td>
                <td class="tg-yw4l">KACA FELM</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">11</td>
                <td class="tg-yw4l">TUTUP BAN SEREP</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">18</td>
                <td class="tg-yw4l">KACA PINTU RR/RH</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">5</td>
                <td class="tg-yw4l">KACA DEPAN</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">12</td>
                <td class="tg-yw4l">KACA DEPAN</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">19</td>
                <td class="tg-yw4l">KACA PINTU RR/LH</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">6</td>
                <td class="tg-yw4l">FUEL CUP</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">13</td>
                <td class="tg-yw4l">KACA BELAKANG</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">20</td>
                <td class="tg-yw4l">KACA SPION</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">7</td>
                <td class="tg-yw4l">TALANG AIR</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">14</td>
                <td class="tg-yw4l">ANTENA</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">21</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <th class="tg-yw4l" colspan="14">Perlengkapan Kendaraan</th>
            </tr>
            <tr>
                <td class="tg-yw4l">1</td>
                <td class="tg-yw4l">DONGKRAK</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l" rowspan="2"></td>
                <td class="tg-yw4l">3</td>
                <td class="tg-yw4l">REMOTE KUNCI</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l" rowspan="2"></td>
                <td class="tg-yw4l">5</td>
                <td class="tg-yw4l">PERKAKAS KUNCI</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
            <tr>
                <td class="tg-yw4l">2</td>
                <td class="tg-yw4l">HANDLE DONGKRAK</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">4</td>
                <td class="tg-yw4l">BAN SEREP</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l">6</td>
                <td class="tg-yw4l">KUNCI</td>
                <td class="tg-yw4l"></td>
                <td class="tg-yw4l"></td>
            </tr>
        </table>
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
