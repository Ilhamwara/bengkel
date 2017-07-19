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
        <td class="tg-031e" style="font-size: 16px;"><b>NOTA SPAREPART</b></td>
    </tr>

    <tr>
        <td class="tg-031e">Jl. Ahmad Yani Km 5.5(Pelingkau)</td>
        <td class="tg-yw4l">Tanggal: 20 juli 2017</td>
    </tr>
    <tr>
        <td class="tg-031e">Telp. 081348956040, Email m_zainuri84@yahoo.com </td>
    </tr>
</table>

<table class="tg profil" style="width: 100%; border:none;">
    <tr>
        <td class="tg-031e">Nomor Faktur</td>
        <td class="tg-031e">:</td>
        <td class="tg-031e">{{$penj->no_nota}}</td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l">Kepada Yth</td>
        <td class="tg-yw4l">:</td>
        <td class="tg-yw4l"></td>
    </tr>
    <tr>
        <td class="tg-031e">Tgl. Faktur</td>
        <td class="tg-031e">:</td>
        <td class="tg-031e">{{$penj->tgl_nota}}</td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l">Nama</td>
        <td class="tg-yw4l">:</td>
        <td class="tg-yw4l">{{$penj->nama}}</td>
    </tr>
    <tr>
        <td class="tg-031e">No BKB</td>
        <td class="tg-031e">:</td>
        <td class="tg-031e">{{$penj->no_bkb}}</td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l">Alamat</td>
        <td class="tg-yw4l">:</td>
        <td class="tg-yw4l">{{$penj->alamat}}</td>
    </tr>
    <tr>
        <td class="tg-yw4l">No Pol</td>
        <td class="tg-yw4l">:</td>
        <td class="tg-yw4l">{{$penj->no_pol}}</td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l">Kota</td>
        <td class="tg-yw4l">:</td>
        <td class="tg-yw4l">{{$penj->kota}}</td>
    </tr>
    <tr>
        <td class="tg-yw4l">Kode</td>
        <td class="tg-yw4l">:</td>
        <td class="tg-yw4l">{{$penj->kode}}</td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l"></td>
        <td class="tg-yw4l"></td>
    </tr>
</table>

<table class="tg" style="width: 100%; margin-bottom: 20px;">
    <thead>
        <tr>
            <th class="tg-yw4l" style="text-align:center;"><b>No</b></th>
            <th class="tg-yw4l" style="text-align:center;"><b>Nomor Part</b></th>
            <th class="tg-yw4l" style="text-align:center;"><b>Nama Part</b></th>
            <th class="tg-yw4l" style="text-align:center;"><b>Qty</b></th>
            <th class="tg-yw4l" style="text-align:center;"><b>Harga</b></th> 
            <th class="tg-yw4l" style="text-align:center;"><b>Total</b></th>
        </tr>
    </thead>
    <tbody>
        @forelse($part as $i => $pa)
        <tr>
          <td class="tg-yw4l" style="text-align: center;">{{$i+1}}</td>
          <td class="tg-yw4l" style="text-align:center;">{{$pa->no_part}}</td>
          <td class="tg-yw4l">{{$pa->nama_part}}</td>
          <td class="tg-yw4l" style="text-align:center;">{{$pa->qty}}</td>
          <td class="tg-yw4l" style="text-align: right;">{{$pa->harga_jual}}</td>
          <td class="tg-yw4l" style="text-align: right;">{{$pa->jumlah}}</td>
      </tr>
      @empty
      @endforelse

  </tbody>
</table>
<table class="tg" style="width: 100%; margin-bottom: 20px;">

    <tbody>
        <tr>
            <td colspan="3" style="border: none;"></td>
            <td colspan="3" style="border: none;"></td>
            <td class="tg-yw4l">Sub Total</td>
            <td class="tg-yw4l">Rp</td>
            <td class="tg-yw4l" style="text-align: right;">{{$part->sum('jumlah')}}</td>
        </tr>
        <tr>
            <td colspan="3" style="border: none;"></td>
            <td colspan="3" style="border: none;"></td>
            <td class="tg-yw4l">Discount</td>
            <td class="tg-yw4l">Rp</td>
            <td class="tg-yw4l" style="text-align: right;"></td>

        </tr><tr>
        <td class="tg-yw4l" style="border: none;">Hormat Kami,</td>
        <td class="tg-yw4l" style="border: none;"></td>
        <td class="tg-yw4l" style="border: none;">Penerima,</td>
        <td colspan="3" style="border: none;"></td>
        <td class="tg-yw4l">Ongkos Kirim</td>
        <td class="tg-yw4l">Rp</td>
        <td class="tg-yw4l" style="text-align: right;"></td>
    </tr>
    <tr>
        <td colspan="3" style="border: none;"></td>
        <td colspan="3" style="border: none;"></td>
        <td class="tg-yw4l" style="border-bottom: 1px solid;">Grand Total</td>
        <td class="tg-yw4l" style="border-bottom: 1px solid;">Rp</td>
        <td class="tg-yw4l" style="text-align: right;border-bottom: 1px solid;">{{$part->sum('jumlah')}}</td>
    </tr>
    <tr>
        <td class="tg-yw4l" style="border: none;">Muhammad Zainuri</td>
        <td class="tg-yw4l" style="border:none;"></td>
        <td class="tg-yw4l" style="border: none; border-bottom:1px solid; width: 15%;"></td>
        <td class="tg-yw4l" style="border:none; width: 10%;"></td>
    </tr>
</tbody>
<tbody>
 <tr>
    <td colspan="6" class="tg-yw4l" style="border:none;"></td>
    <td colspan="3" class="tg-yw4l" style="text-align:center;">Rekening Bank</td>
</tr>
<tr>
    <td colspan="6" class="tg-yw4l" style="border:none;"></td>
    <td class="tg-yw4l">Mandiri</td>
    <td class="tg-yw4l" style="border:none;">:</td>
    <td class="tg-yw4l">9000 0359 4136 9</td>
</tr>
<tr>
    <td colspan="6" class="tg-yw4l" style="border:none;"></td>
    <td class="tg-yw4l">BCA</td>
    <td class="tg-yw4l">:</td>
    <td class="tg-yw4l">8585 1186 44</td>
</tr>

</tbody>
</table>
</body>
</html>