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
      <td class="tg-031e" style="font-size: 16px;"><b>ESTIMASI BIAYA</b></td>
    </tr>

    <tr>
      <td class="tg-031e">Jl. Ahmad Yani Km 5.5(Pelingkau)</td>
      <td class="tg-yw4l">{{$estimasi->tanggal}}</td>
    </tr>
    <tr>
      <td class="tg-031e">Telp. 081348956040, Email m_zainuri84@yahoo.com </td>
      <td class="tg-yw4l">No WO: {{$estimasi->no_wo}}</td>
    </tr>
  </table>

  <table class="tg profil" style="width: 100%; border:none;">
    <tr>
      <td class="tg-031e">Nama</td>
      <td class="tg-031e">:</td>
      <td class="tg-031e">{{$estimasi->nama_pelanggan}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Type</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$estimasi->type}}</td>
    </tr>
    <tr>
      <td class="tg-031e">Alamat</td>
      <td class="tg-031e">:</td>
      <td class="tg-031e">{{$estimasi->alamat}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Noka/Nosin</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$estimasi->noka_nosin}}</td>
    </tr>
    <tr>
      <td class="tg-yw4l">No Polisi</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$estimasi->no_pol}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Warna</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$estimasi->warna}}</td>
    </tr>
    <tr>
      <td class="tg-yw4l">Telp</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$estimasi->telepon}}</td>
      <td class="tg-yw4l"></td>
      <td class="tg-yw4l">Km/ Fuel</td>
      <td class="tg-yw4l">:</td>
      <td class="tg-yw4l">{{$estimasi->fuel_datang}}</td>
    </tr>
  </table>
  <table class="tg" style="width: 100%; margin-bottom:5%;border:none;">
    <thead style="border: 1px solid; border-right: none;border-left: none;">
      <tr>
        <td class="tg-yw4l" style="text-align: center;"><b>No</b></td>
        <td class="tg-yw4l" style="text-align: center;"><b>Nama Part</b></td>
        <td class="tg-yw4l" style="text-align: center;"><b>No Part</b></td>
        <td class="tg-yw4l" style="text-align: center;"><b>Qty</b></td>
        <td class="tg-yw4l" style="text-align: center;"><b>Hrg Satuan</b></td>
        <td class="tg-yw4l" style="text-align: center;"><b>Jumlah</b></td>
      </tr>
    </thead>
    <tbody>
    @forelse($est_part as $v => $part)
      <tr>
        <td class="tg-yw4l" style="text-align: center;">{{$v+1}}</td>
        <td class="tg-yw4l">{{$part->nama}}</td>
        <td class="tg-yw4l" style="text-align: center;">{{$part->no}}</td>
        <td class="tg-yw4l" style="text-align: center;">{{$part->qty}}</td>
        <td class="tg-yw4l" style="text-align: right;">{{$part->harga_jual}}</td>
        <td class="tg-yw4l" style="text-align: right;">{{$part->jumlah}}</td>
      </tr>
      @empty
      @endforelse
    </tbody>
    <tbody style="border-top:1px solid;">
      <tr>
        <td colspan="4" style="border: none;"></td>

        <td class="tg-yw4l" style="text-align: center;"><b>Total Part</b></td>
       <!--  <td class="tg-yw4l" style="text-align: right;">{{$est_part->sum('jumlah')}}</td> -->
      </tr>

    </tbody>
  </table>

  <!-- <table class="tg" style="width: 100%; margin-bottom:5%;border:none;">
    <thead style="border: 1px solid; border-right: none;border-left: none;">
      <tr>
        <td class="tg-yw4l" style="text-align: center;"><b>No</b></td>
        <td class="tg-yw4l" style="text-align: center;"><b>Jasa</b></td>
        <td class="tg-yw4l" style="text-align: center;"><b>Fr</b></td>
        <td class="tg-yw4l" style="text-align: center;"><b>Harga Per FR</b></td>
        <td class="tg-yw4l" style="text-align: center;"><b>Jumlah</b></td>
      </tr>
    </thead>
    <tbody>
    @forelse($est_jasa as $i => $jasa)
      <tr>
        <td class="tg-yw4l" style="text-align: center;">{{$i+1}}</td>
        <td class="tg-yw4l">{{$jasa->nama_jasa}}</td>
        <td class="tg-yw4l" style="text-align: center;">{{$jasa->fr}}</td>
        <td class="tg-yw4l" style="text-align: center;">{{$jasa->harga_perfr}}</td>
        <td class="tg-yw4l" style="text-align: right;">{{$jasa->jumlah}}</td>
      </tr>
      @empty
@endforelse
    </tbody>
    <tbody style="border-top:1px solid;">
      <tr>
        <td colspan="3" style="border: none;"></td>

        <td class="tg-yw4l" style="text-align: center;"><b>Total jasa</b></td>
        <td class="tg-yw4l" style="text-align: right;">{{$est_jasa->sum('jumlah')}}</td>
      </tr>

    </tbody>
  </table> -->
  <table class="tg" style=" width:100% ;margin-bottom:5%;border:none; ">
    <tbody>
      <tr>
        <td class="tg-yw4l" style="text-align: center; border:none; width: 50%;"><b></b></td>
        <td class="tg-yw4l" style="text-align: center; border:none; width: 25%; border-bottom:1px solid;"><b>Sub Total</b></td>
        <td class="tg-yw4l" style="text-align: right; border:none; width: 25%; border-bottom:1px solid;"></td>
      </tr>

    </tbody>
  </table>
  <br>

  <table class="tg" style=" width:50% ;margin-bottom:5%;border:none;">
    <thead style="border:none;">
      <tr>
        <th class="tg-yw4l" style="text-align: left; border:none;"><b>Keterangan</b></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="tg-yw4l" style="border:none;">{{$estimasi->keterangan}}/td>
      </tr>

    </tbody>
  </table>
  <table class="tg" width="60%">
    <thead>
      <tr>
        <th class="tg-yw4l" style="border:none;">Pangkalan Bun 19 Mei 2017
        </th>
      </tr>
    </thead>
  </table>

  <table class="tg" width="100%" style="text-align: center;">
    <thead>
      <tr>
        <th class="tg-yw4l" style="border:none;">Yang Membuat,</th>
        <th class="tg-yw4l" style="border:none;"></th>
        <th class="tg-yw4l" style="border:none;">Menyetujui,</th>
      </tr>
    </thead>
    <tbody>
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
        <td class="tg-yw4l" style="border:none;">BENGKEL AUTO VISTON</td>
        <td class="tg-yw4l" style="border:none;"></td>
        <td class="tg-yw4l" style="border:none;">Nama Customer</td>
      </tr>
    </tbody>
  </table>

</body>
</html>