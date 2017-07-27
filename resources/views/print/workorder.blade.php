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
      padding-left: 0;
    }
  </style>
</head>
<body>

  <table class="tg header" style="width: 100%; margin-bottom: 15px;">
    <tr>
      <td class="tg-031e" style="font-size: 16px;"><b>AUTO VISION</b></td>
      <td class="tg-031e" style="font-size: 16px;"><b>WORK ORDER</b></td>
    </tr>

    <tr>
      <td class="tg-031e">Jl. Ahmad Yani Km 5.5(Pelingkau)</td>
      <td class="tg-yw4l">Tanggal: 20 juli 2017</td>
    </tr>
    <tr>
      <td class="tg-031e">Telp. 081348956040, Email m_zainuri84@yahoo.com </td>
      <td class="tg-yw4l">No WO: {{$order->no_wo}} </td>
    </tr>
  </table>

  <table class="tg profil" style="width: 100%; border:none; margin-bottom: 15px;">
    <tr>
      <td class="tg-031e">Nama</td>
      <td class="tg-031e">:</td>
      <td class="tg-031e">{{$order->nama_pelanggan}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Type</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$order->tipe}}</td>
    </tr>
    <tr>
      <td class="tg-031e">Alamat</td>
      <td class="tg-031e">:</td>
      <td class="tg-031e">{{$order->alamat}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Noka/Nosin</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$order->noka_nosin}}</td>
    </tr>
    <tr>
      <td class="tg-yw4l">No Polisi</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$order->no_pol}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Warna</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$order->warna}}</td>
    </tr>
    <tr>
      <td class="tg-yw4l">Telp</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$order->telepon}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Km/ Fuel</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$order->fuel_datang}}</td>
    </tr>
  </table>
  <table class="tg keluhan" style="width: 100%; margin-bottom: 10px;border-collapse:collapse;border-spacing:0; border-style:solid;border-width:1px; border-right: none; border-left: none;">
    <thead>
      <tr>
        <td colspan="2" class="tg-031el" style="text-align: center; border-right: none; border-left:none;"><b>KELUHAN PELANGGAN/ PERINTAH KERJA</b></td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="tg-yw4l" style="text-align: center; border: none;"></td>
        <td class="tg-yw4l" style="border:none;">{!!$order->keluhan!!}</td>
      </tr>
    </tbody>
  </table>

  <table class="tg" style="width: 100%; margin-bottom:5%;border:none;">
    <thead style="border: 1px solid; border-right: none;border-left: none;">
      <tr>
        <td class="tg-yw4l" style="text-align: center; border:none;"><b>No</b></td>
        <td class="tg-yw4l" style="text-align: center; border: none;"><b>EST SPARE PART DAN JASA</b></td>
        <td class="tg-yw4l" style="text-align: center; border: none;"><b>QTY</b></td>
        <td class="tg-yw4l" style="text-align: center; border: none;"><b>HARGA SAT</b></td>
        <td class="tg-yw4l" style="text-align: center; border: none;"><b>JUMLAH</b></td>
      </tr>
    </thead>
    <tbody>
      @forelse($est_part as $i => $data)
      <tr>
        <td class="tg-yw4l" style="text-align: center; border:none;">{{$i+1}}</td>
        <td class="tg-yw4l" style="border: none; text-align: center;">{{$data->nama}}</td>
        <td class="tg-yw4l" style="text-align: center;border: none;">{{$data->qty}}</td>
        <td class="tg-yw4l" style="text-align: right;border: none;">{{$data->harga_jual}}</td>
        <td class="tg-yw4l" style="text-align: right;border: none;">{{$data->jumlah}}</td>
      </tr>
      @empty
      @endforelse
    </tbody>
    <tbody style="border-top:1px solid;">
      <tr>
        <td colspan="2" style="border: none;"></td>
        <td class="tg-yw4l" style="border: none; border-bottom: 1px solid;"">Est Biaya</td>
        <td class="tg-yw4l" style="border: none;  border-bottom: 1px solid;">Rp</td>
        <td class="tg-yw4l" style="text-align: right; border: none;  border-bottom: 1px solid;">{{$est_part->sum('jumlah')}}</td>
      </tr>

    </tbody>
  </table>
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