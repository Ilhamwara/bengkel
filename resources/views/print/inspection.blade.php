<html>
<head>
  <title>Work Order</title>  
  <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
    .tg .tg-yw4l{vertical-align:top}
    .header .tg-031e, .header .tg-yw4l{
      border:none!important;
    }
    .header{
      border-bottom:2px solid #666!important;
    }
    .profil .tg-031e, .profil .tg-yw4l{
      border:none!important;
    }
    body{
      width: 700px;
      margin: 0 auto;
    }
  </style>
</head>
<body>

  <table class="tg header" style="width: 100%; margin-bottom: 20px;">
    <tr>
      <td class="tg-031e" style="font-size: 16px;"><b>AUTO VISION</b></td>
      <td class="tg-031e" style="font-size: 16px;"><b>WORK ORDER</b></td>
    </tr>

    <tr>
      <td class="tg-031e">Jl. Ahmad Yani Km 5.5(Pelingkau)</td>
      <td class="tg-yw4l">Tanggal: {{$inspect->tgl}}</td>
    </tr>
    <tr>
      <td class="tg-031e">Telp. 081348956040, Email m_zainuri84@yahoo.com </td>
      <td class="tg-yw4l">No WO:{{$pelanggan->no_wo}}</td>
    </tr>
  </table>

  <table class="tg profil" style="width: 100%; border:none;">
    <tr>
      <td class="tg-031e">Nama</td>
      <td class="tg-031e">:</td>
      <td class="tg-031e">{{$pelanggan->nama}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Type</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$pelanggan->tipe}}</td>
    </tr>
    <tr>
      <td class="tg-031e">Alamat</td>
      <td class="tg-031e">:</td>
      <td class="tg-031e">{{$pelanggan->alamat}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Noka/Nosin</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$pelanggan->noka_nosin}}</td>
    </tr>
    <tr>
      <td class="tg-yw4l">No Polisi</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$pelanggan->no_pol}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Warna</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$pelanggan->warna}}</td>
    </tr>
    <tr>
      <td class="tg-yw4l">Telp</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$pelanggan->telepon}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Km/ Fuel</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$pelanggan->fuel_datang}}</td>
    </tr>
  </table>
<table class="table table-striped table-bordered table-hover table-checkable order-column">
                <tr>
                    <th class="tg-yw4">No</th>
                    <th class="tg-yw4">Type</th>
                    <th class="tg-yw4">Nama</th>
                </tr>
                @foreach($inspections as $k => $data)                
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$data->type}}</td>
                    <td>{{$data->nama}}</td>
                </tr>
                @endforeach
            </table>

<div class="col-sm-offset-1 col-sm-10">
    <h4><b>Kondisi Body Luar Kendaraan</b></h4>
    <br>
    @foreach($foto as $data_foto)
        <div class="col-md-4">
            <img src="{{url('storage/uploads/img/'.$data_foto->img)}}" class="img-responsive">
        </div>
        <div class="col-md-4">
            <img src="{{url('storage/uploads/img/'.$data_foto->img)}}" class="img-responsive">
        </div>
        <div class="col-md-4">
            <img src="{{url('storage/uploads/img/'.$data_foto->img)}}" class="img-responsive">
        </div>
    @endforeach  
</div>

  <table class="tg" width="100%" style="text-align: center;">
    <tr>
      <td class="tg-yw4l" style="border:none;">Diterima Oleh</td>
      <td class="tg-yw4l" style="border:none;"></td>
      <td class="tg-yw4l" style="border:none;">Diserahkan Oleh</td>
    </tr>
    <tr>
      <td class="tg-yw4l" style="padding: 50px 0; border:none;"></td>
      <td class="tg-yw4l" style="border:none;"></td>
      <td class="tg-yw4l" style="padding: 50px 0; border:none;"></td>
    </tr>
    <tr>
      <td class="tg-yw4l" style="border:none;"><b>Muhammad Zainuri</b></td>
      <td class="tg-yw4l" style="border:none;"></td>
      <td class="tg-yw4l" style="border:none;"></td>
    </tr>
    <tr>
      <td class="tg-yw4l" style="border:none;">Service Advisor</td>
      <td class="tg-yw4l" style="border:none;"></td>
      <td class="tg-yw4l" style="border:none;">Pemilik/ Pembawa Kendaraan</td>
    </tr>
  </table>

</body>
</html>