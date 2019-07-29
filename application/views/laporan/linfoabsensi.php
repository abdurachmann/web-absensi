<!-- Full Table -->
<div class="block block-bordered">
	<div class="block-content">
		<?php echo form_open('linfoabsensi/gofilter','class="form-horizontal push-10-t"') ?>
		<div class="form-group">
			<label class="col-md-3 control-label" for="example-hf-email">Pegawai</label>
			<div class="col-md-7">
				<select class="form-control" name="nik">
					<option value="0" <?=($nik == 0 ? 'selected':'') ?>>Semua Pegawai</option>
					<?php foreach ($pegawai as $row) { ?>
						<option value="<?= $row->nik ?>" <?=($nik == $row->nik ? 'selected':'') ?>><?= $row->nama ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="example-hf-email">Tanggal</label>
			<div class="col-md-3">
				<input type="date" class="form-control" placeholder="Tanggal Awal" name="tanggal_awal" value="{tanggal_awal}">
			</div>
			<div class="col-md-1"><center>-</center></div>
			<div class="col-md-3">
				<input type="date" class="form-control" placeholder="Tanggal Akhir" name="tanggal_akhir" value="{tanggal_akhir}">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="example-hf-email"></label>
			<div class="col-md-7">
				<button class="btn btn-primary" type="submit" name="button"><i class="fa fa-filter"></i> Filter</button>
			</div>
		</div>
	</div>
</div>

<!-- Full Table -->
<div class="block block-bordered">
	<div class="block-content">
    <table class="table table-bordered table-striped">
      <tr>
        <td colspan="7" style="text-align:center;border:none;background-color:#fff;"><b><u>LAPORAN INFORMASI ABSENSI</u></b></td>
      </tr>
      <tr>
        <th style="text-align:center">No.</th>
        <th style="text-align:center">Tanggal</th>
        <th style="text-align:center">Pegawai</th>
        <th style="text-align:center">Jumlah Kehadiran</th>
				<th style="text-align:center">Jumlah Keterlambatan</th>
				<th style="text-align:center">Jumlah Pulang Cepat</th>
				<th style="text-align:center"></th>
      </tr>

      <!-- default variable -->
      <?php $number = 0; ?>
      <?php if ($laporan != '') { ?>
        <?php foreach ($laporan as $row) { ?>
          <?php $number = $number + 1; ?></td>

          <!-- menampilkan data laporan -->
          <tr>
            <td style="text-align:center"><?=$number;?></td>
            <td><?=$row->tanggal;?></td>
            <td><?=$row->namapegawai;?></td>
						<td><?=$row->jumlahkehadiran;?></td>
						<td><?=$row->jumlahketerlambatan;?></td>
						<td><?=$row->jumlahpulangcepat;?></td>
            <td>
							<a class="btn btn-primary" href="{base_url}linfoabsensi/detail/<?=$row->nik?>/<?=$tanggal_awal?>/<?=$tanggal_akhir?>"><i class="fa fa-eye"></i></a>
						</td>
          </tr>
        <? } ?>
      <? } ?>

      <tr style="border:none;background-color:#fff;">
        <td colspan="7" style="text-align:right;border-color: #fff;">Absensi PT Dinus Cipta Mandiri - Laporan <?=date("d/m/Y - h:i:s");?></td>
      </tr>
    </table>
  </div>
</div>
