<html>
<head>
  <title>Nota Service</title>  
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

  <table class="tg header" style="width: 100%; margin-bottom: 15px;">
    <tr>
      <td class="tg-031e" style="font-size: 16px;"><b>AUTO VISTON</b></td>
      <td class="tg-031e" style="font-size: 16px;"><b>NOTA SERVICE</b></td>
    </tr>

    <tr>
      <td class="tg-031e">Jl. Ahmad Yani Km 5.5(Pelingkau)</td>
      <td class="tg-yw4l">Tanggal: {{$nota->tanggal}}</td>
    </tr>
    <tr>
      <td class="tg-031e">Telp. 081348956040, Email m_zainuri84@yahoo.com </td>
      <td class="tg-yw4l">No WO: {{$wo->no_wo}}</td>
    </tr>
  </table>

  <table class="tg profil" style="width: 100%; border:none;">
    <tr>
      <td class="tg-031e">Nama</td>
      <td class="tg-031e">:</td>
      <td class="tg-031e">{{$wo->nama_pelanggan}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Type</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$wo->tipe}}</td>
    </tr>
    <tr>
      <td class="tg-031e">Alamat</td>
      <td class="tg-031e">:</td>
      <td class="tg-031e">{{$wo->alamat}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Noka/Nosin</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$wo->noka_nosin}}</td>
    </tr>
    <tr>
      <td class="tg-yw4l">No Polisi</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$wo->no_pol}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Warna</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$wo->warna}}</td>
    </tr>
    <tr>
      <td class="tg-yw4l">Telp</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$wo->telepon}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Km/ Fuel</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$wo->km_datang}} / {{$wo->fuel_datang}} </td>
    </tr>
  </table>
  <table class="tg" style="width: 100%; border:none;margin-bottom: 10px;">
    <thead>

      <tr>
        <th class="tg-yw4l">No</th>
        <th class="tg-yw4l">SPAREPART</th>
        <th class="tg-yw4l">Qty</th>
        <th class="tg-yw4l">Harga Set</th>
        <th class="tg-yw4l">Jumlah</th>
        <th class="tg-yw4l">No</th>
        <th class="tg-yw4l">Jasa Perbaikan</th>
        <th class="tg-yw4l">In/Ex</th>
        <th class="tg-yw4l">Jumlah</th>
      </tr>
    </thead>
    <tbody>
    @forelse($est_part as $i => $data)
      <tr>
        <td class="tg-yw4l" style="text-align: center;">{{$i+1}}</td>
        <td class="tg-yw4l">{{$data->nama}}</td>
        <td class="tg-yw4l" style="text-align: center;">{{$data->qty}}</td>
        <td class="tg-yw4l" style="text-align: right;">{{$data->harga_jual}}</td>
        <td class="tg-yw4l" style="text-align: right;">{{$data->jumlah}}</td>
        <td class="tg-yw4l" style="text-align: center;">1</td>
        <td class="tg-yw4l">bubut lock</td>
        <td class="tg-yw4l" style="text-align: center;">IN</td>
        <td class="tg-yw4l" style="text-align: right;">15000000</td>
      </tr>
      @empty
      @endforelse
      <tr>
        <td colspan="4" class="tg-yw4l">TOTAL PART & BAHAN</td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l">TOTAL JASA</td>
        <td colspan="3" class="tg-yw4l"></td>

      </tr>
      <tr>
        <td colspan="4" class="tg-yw4l">DISCOUNT PART & BAHAN</td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l">DISCOUNT JASA INTERNAL 10%</td>
        <td colspan="3" class="tg-yw4l"></td>
      </tr>
      <tr>
        <td colspan="4" class="tg-yw4l">SUB TOTAL PART & BAHAN</td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l">SUB TOTAL JASA</td>
        <td colspan="3" class="tg-yw4l"></td>
      </tr>
      <tr>
       <td colspan="6" class="tg-yw4l" style="border:none;"></td>
       <td class="tg-yw4l" style="border:none; border-bottom: 2px solid;">GRAND TOTAL</td>
       <td colspan="2" class="tg-yw4l" style="border:none; border-bottom: 2px solid;"></td>
     </tbody>
   </table>

   <table class="tg" width="60%">
    <tr>
      <td class="tg-yw4l" style="border:none;">Dibuat Oleh</td>
      <td class="tg-yw4l" style="border:none;"></td>
      <td class="tg-yw4l" style="border:none;">Keterangan</td>
    </tr>
    <tr>
      <td class="tg-yw4l" style="padding: 50px 0; border:none;"></td>
      <td class="tg-yw4l" style="border:none;"></td>
      <td class="tg-yw4l" style="padding: 50px 0; border:none;">{{$nota->keterangan}}</td>
    </tr>
    <tr>
      <td class="tg-yw4l" style="border:none;"><b>Muhammad Zainuri</b></td>
      <td class="tg-yw4l" style="border:none;"></td>
      <td class="tg-yw4l" style="border:none;"></td>
    </tr>
    <tr>
      <td class="tg-yw4l" style="border:none; border-top:2px solid; width: 20%;text-align: center;"><b>Cashier</b></td>
      <td class="tg-yw4l" style="border:none;"></td>
      <td class="tg-yw4l" style="border:none;"></td>
    </tr>

  </table>

</body>
</html>