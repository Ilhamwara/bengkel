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
      <td class="tg-yw4l">No WO:{{$inspect->no_wo}}</td>
    </tr>
  </table>

  <table class="tg profil" style="width: 100%; border:none;">
    <tr>
      <td class="tg-031e">Nama</td>
      <td class="tg-031e">:</td>
      <td class="tg-031e">{{$pelanggans->nama}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Type</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$pelanggans->tipe}}</td>
    </tr>
    <tr>
      <td class="tg-031e">Alamat</td>
      <td class="tg-031e">:</td>
      <td class="tg-031e">{{$pelanggans->alamat}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Noka/Nosin</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$pelanggans->noka_nosin}}</td>
    </tr>
    <tr>
      <td class="tg-yw4l">No Polisi</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$pelanggans->no_pol}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Warna</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$pelanggans->warna}}</td>
    </tr>
    <tr>
      <td class="tg-yw4l">Telp</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$pelanggans->telepon}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Km/ Fuel</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$inspect->fuel_datang}}</td>
    </tr>
  </table>
  <table class="tg keluhan" style="width: 100%; margin-bottom: 10px;border-collapse:collapse;border-spacing:0; border-style:solid;border-width:1px; border-right: none; border-left: none;">
    <thead>
      <tr>
        <td colspan="2" class="tg-031el" style="text-align: center; border-right: none; border-left:none;"><b>DOKUMEN KENDARAAN</b></td>
      </tr>
    </thead>
    <tbody>
  
      <tr>
        <td class="tg-yw4l">1</td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l"></td>
      </tr>
 
    </tbody>
    <thead>
      <tr>
        <td colspan="2" class="tg-031el" style="text-align: center; border-right: none; border-left:none;"><b>FUNGSI AKSESORIS BAGIAN DALAM</b></td>
      </tr>
    </thead>
     <tbody>
      <tr>
        <td class="tg-yw4l">1</td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l"></td>
      </tr>
    </tbody>
     <thead>
      <tr>
        <td colspan="2" class="tg-031el" style="text-align: center; border-right: none; border-left:none;"><b>FUNGSI AKSESORIS BAGIAN LUAR</b></td>
      </tr>
    </thead>
     <tbody>
      <tr>
        <td class="tg-yw4l">1</td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l"></td>
      </tr>
    </tbody>
     <thead>
      <tr>
        <td colspan="2" class="tg-031el" style="text-align: center; border-right: none; border-left:none;"><b>PERLENGKAPAN KENDARAAN</b></td>
      </tr>
    </thead>
     <tbody>
      <tr>
        <td class="tg-yw4l">1</td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l"></td>
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