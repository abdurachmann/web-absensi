<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
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
<?
foreach($laporan as $row) {
?>
<tr>
<tr>
    <td style="text-align:center"><?=$number;?></td>
    <td><?=$row->tanggal;?></td>
    <td><?=$row->namapegawai;?></td>
                <td><?=$row->absenmasuk;?></td>
                <td><?=$row->absenkeluar;?></td>
    <td><?=$row->keteranganmasuk;?></td>
    <td><?=$row->keterangankeluar;?></td>
</tr>
</tr>
<? } ?>
</table