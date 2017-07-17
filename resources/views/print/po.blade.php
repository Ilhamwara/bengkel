<html>
<head>
  <title>Purchase Order</title>  
  <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
    .tg .tg-yw4l{vertical-align:top}
    .header .tg-031e, .header .tg-yw4l{
      border:none!important;
    }
    table.header{
      border:none;
      border-bottom:1px solid #666!important;
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
      <td class="tg-031e" style="font-size: 16px;"><b>PURCHASE ORDER</b></td>
    </tr>
    <tr>
      <td class="tg-031e">Jl. Ahmad Yani Km 5.5(Pelingkau)</td>
    </tr>
    <tr>
      <td class="tg-031e">Telp. 081348956040, Email m_zainuri84@yahoo.com </td>
    </tr>
  </table>

  <table class="tg profil" style="width: 100%; border:none;">
    <tbody>

      <tr>
        <td class="tg-031e" style="width: 50%;"">Kepada</td>
        <td class="tg-031e"></td>
        <td class="tg-031e">Tgl PO</td>
        <td class="tg-yw4l">:</td>
        <td class="tg-yw4l">{{$cetak->tanggal}}</td>
      </tr>
    </tbody>
    <tbody>
      <tr>
        <td class="tg-031e" style="width: 50%;">{{$cetak->nama}}</td>
        <td class="tg-031e"></td>
        <td class="tg-031e">No PO</td>
        <td class="tg-yw4l">:</td>
        <td class="tg-yw4l">{{$cetak->no_po}}</td>

      </tr>
      <tr>
        <td class="tg-yw4l" style="width: 50%;">Ditempat</td>
        <td class="tg-031e"></td>
        <td class="tg-031e">Status Pengiriman</td>
        <td class="tg-yw4l">:</td>
        <td class="tg-yw4l">{{$cetak->status}}</td>
      </tr>
    </tbody>
  </table>

  <table class="tg" style="width: 100%;">
    <thead>
     <tr>
      <th style="text-align: center;">No</th>
      <th style="text-align: center;">Part Number</th>
      <th style="text-align: center;">Part Name</th>
      <th style="text-align: center;">Qty</th>
      <th style="text-align: center;">ORY</th>
      <th style="text-align: center;">Thailand</th>
      <th style="text-align: center;">Jepang</th>
    </tr>
  </thead>
  <tbody>
    @forelse($po_part as $i => $data)
    <tr>
      <td style="text-align: center;">{{$i+1}}</td>
      <td style="text-align: center;">{{$data->part_number}}</td>
      <td style="text-align: center;">{{$data->part_name}}</td>
      <td style="text-align: center;">{{$data->qty}}</td>
      <td style="text-align: right;">{{$data->ory}}</td>
      <td style="text-align: right;">{{$data->thailand}}</td>
      <td style="text-align: right;">{{$data->jepang}}</td>
    </tr>
    @empty
    @endforelse
  </tbody>

</table>
</body>
</html>