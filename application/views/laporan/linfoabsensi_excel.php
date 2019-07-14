<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Lapoarn Absensi.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<h3>Laporan Absensi</h3>
<table border='1' width="70%">
  <tr>
    <td>No</td>
    <td>Tanggal</td>
    <td>Pegawai</td>
    <td>Absen Masuk</td>
    <td>Absen Keluar</td>
    <td>Keterangan Masuk</td>
    <td>Keterangan Keluar</td>
  </tr>
  <? $number = 1 ?>
  <? foreach($laporan as $row) { ?>
    <tr>
        <td><?=$number++;?></td>
        <td><?=$row->tanggal;?></td>
        <td><?=$row->namapegawai;?></td>
        <td><?=$row->absenmasuk;?></td>
        <td><?=$row->absenkeluar;?></td>
        <td><?=$row->keteranganmasuk;?></td>
        <td><?=$row->keterangankeluar;?></td>
    </tr>
  <? } ?>
</table>
