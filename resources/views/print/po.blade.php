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
      padding: 4px;
      font-size: 12px;
    }
    body{
      width: 700px;
      margin: 0 auto;
    }
     .po .tg-yw4l{
      font-size: 11px;
      padding: 4px;
     }
  </style>
</head>
<body>

  <table class="tg header" style="width: 100%; margin-bottom: 15px;">
    <tr>
      <td class="tg-031e" style="font-size: 16px;"><b>AUTO VISTON</b></td>
      <td class="tg-031e" style="font-size: 16px;"><b>PURCHASE ORDER</b></td>
    </tr>
    <tr>
      <td class="tg-031e">Jl. Ahmad Yani Km 5.5 (Pelingkau)</td>
    </tr>
    <tr>
      <td class="tg-031e">Telp. 081348956040, Email m_zainuri84@yahoo.com </td>
    </tr>
  </table>

  <table class="tg profil" style="width: 100%; border:none; margin-bottom: 15px;">
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

  <table class="tg po" style="width: 100%;">
    <thead>
     <tr>
      <th class="tg-yw4l" style="text-align: center;">No</th>
      <th class="tg-yw4l" style="text-align: center;">Part Number</th>
      <th class="tg-yw4l" style="text-align: center;">Part Name</th>
      <th class="tg-yw4l" style="text-align: center;">Qty</th>
      <th class="tg-yw4l" style="text-align: center;">ORY</th>
      <th class="tg-yw4l" style="text-align: center;">Thailand</th>
      <th class="tg-yw4l" style="text-align: center;">Jepang</th>
    </tr>
  </thead>
  <tbody>
    @forelse($po_part as $i => $data)
    <tr>
      <td class="tg-yw4l" style="text-align: center;">{{$i+1}}</td>
      <td class="tg-yw4l" style="text-align: center;">{{$data->part_number}}</td>
      <td class="tg-yw4l" style="text-align: center;">{{$data->part_name}}</td>
      <td class="tg-yw4l" style="text-align: center;">{{$data->qty}}</td>
      <td class="tg-yw4l" style="text-align: right;">{{number_format($data->ory)}}</td>
      <td class="tg-yw4l" style="text-align: right;">{{number_format($data->thailand)}}</td>
      <td class="tg-yw4l" style="text-align: right;">{{number_format($data->jepang)}}</td>
    </tr>
    @empty
    @endforelse
  </tbody>

</table>
</body>
</html>