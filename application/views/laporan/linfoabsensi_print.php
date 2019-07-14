
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <style>
    * {
      font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace;
    }
    body {
      -webkit-print-color-adjust: exact;
    }
    @media print {
      table {
        font-size: 9px !important;
        border-collapse: collapse !important;
        width: 100% !important;
      }
      td {
        padding: 5px;
      }
      .content td {
        padding: 0px;
      }
      .content-2 td {
        margin: 3px;
      }

      /* border-normal */
      .border-full {
        border: 1px solid #000 !important;
      }
      .border-bottom {
        border-bottom:1px solid #000 !important;
      }

      /* border-thick */
      .border-thick-top{
        border-top:2px solid #000 !important;
      }
      .border-thick-bottom{
        border-bottom:2px solid #000 !important;
      }

      .border-dotted{
        border-width: 1px;
        border-bottom-style: dotted;
      }

      /* text-position */
      .text-center{
        text-align: center !important;
      }
      .text-right{
        text-align: right !important;
      }

      /* text-style */
      .text-italic{
        font-style: italic;
      }
      .text-bold{
        font-weight: bold;
      }
    }

    @media screen {
      table {
        font-size: 9px !important;
        border-collapse: collapse !important;
        width: 100% !important;
      }
      td {
        padding: 5px;
      }
      .content td {
        padding: 0px;
      }
      .content-2 td {
        margin: 3px;
      }

      /* border-normal */
      .border-full {
        border: 1px solid #000 !important;
      }
      .border-bottom {
        border-bottom:1px solid #000 !important;
      }

      /* border-thick */
      .border-thick-top{
        border-top:2px solid #000 !important;
      }
      .border-thick-bottom{
        border-bottom:2px solid #000 !important;
      }

      .border-dotted{
        border-width: 1px;
        border-bottom-style: dotted;
      }

      /* text-position */
      .text-center{
        text-align: center !important;
      }
      .text-right{
        text-align: right !important;
      }

      /* text-style */
      .text-italic{
        font-style: italic;
      }
      .text-bold{
        font-weight: bold;
      }
    }
    </style>
  </head>
  <body style="padding: 20px;">
    <table class="table table-bordered table-striped">
      <tr>
        <td colspan="10" style="text-align:center;border:none;background-color:#fff;"><b><u>LAPORAN INFORMASI ABSENSI</u></b></td>
      </tr>
      <tr>
        <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;">No.</th>
        <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;">Tanggal</th>
        <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;">Pegawai</th>
        <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;">Absen Masuk</th>
        <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;">Absen Keluar</th>
        <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;">Mac Address</th>
        <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;">Latitude</th>
        <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;">Longitude</th>
        <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;">Keterangan Masuk</th>
        <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;">Keterangan Keluar</th>
      </tr>

      <!-- default variable -->
      <?php $number = 0; ?>
      <?php if ($laporan != '') { ?>
        <?php foreach ($laporan as $row) { ?>
          <?php $number = $number + 1; ?></td>
          <tr>
            <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;"><?=$number;?></td>
            <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;"><?=$row->tanggal;?></td>
            <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;"><?=$row->namapegawai;?></td>
    				<td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;"><?=$row->absenmasuk;?></td>
    				<td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;"><?=$row->absenkeluar;?></td>
    				<td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;"><?=$row->macaddress;?></td>
            <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;"><?=$row->latitude;?></td>
            <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;"><?=$row->longitude;?></td>
            <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;"><?=$row->keteranganmasuk;?></td>
            <td style="border-bottom:1px; border-top-style:solid; border-bottom-style:solid; text-align:center;"><?=$row->keterangankeluar;?></td>
          </tr>
        <? } ?>
      <? } ?>
      <tr style="border:none;background-color:#fff;">
        <td colspan="10" style="text-align:right;border-color: #fff;">Absensi PT Dinus Cipta Mandiri - Laporan <?=date("d/m/Y - h:i:s");?></td>
      </tr>
    </table>
  </body>
</html>
