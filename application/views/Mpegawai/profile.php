<?php echo errorSuccess($this->session)?>
<?php if($error != '') echo errorMessage($error)?>

<div class="block">
	<div class="block-header">
		<ul class="block-options">
        <li>
            <a href="{base_url}mpegawai" class="btn"><i class="fa fa-reply"></i></a>
        </li>
    </ul>
		<h3 class="block-title">{title}</h3>
	</div>
	<div class="block-content block-content-narrow">
		<?php echo form_open('mpegawai/profile_update','class="form-horizontal push-10-t"') ?>
			<div class="form-group">
				<label class="col-md-3 control-label" for="">NIK</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" value="{nik}" <?=($user_jabatan != 'HRD' ? 'disabled':'')?> required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="">Nama</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{nama}" <?=($user_jabatan != 'HRD' ? 'disabled':'')?> required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="">Jabatan</label>
				<div class="col-md-7">
					<select class="form-control" <?=($user_jabatan != 'HRD' ? 'disabled':'')?>  name="jabatan">
						<option value="0" selected disabled>Pilih Jabatan</option>
						<option value="Sopir" <?=($jabatan == 'Sopir' ? 'selected':'')?>>Sopir</option>
						<option value="Helper" <?=($jabatan == 'Helper' ? 'selected':'')?>>Helper</option>
						<option value="Satpam" <?=($jabatan == 'Satpam' ? 'selected':'')?>>Satpam</option>
						<option value="Ka.Gudang" <?=($jabatan == 'Ka.Gudang' ? 'selected':'')?>>Ka.Gudang</option>
						<option value="Finance" <?=($jabatan == 'Finance' ? 'selected':'')?>>Finance</option>
						<option value="Adm" <?=($jabatan == 'Adm' ? 'selected':'')?>>Adm</option>
						<option value="Adm Sales" <?=($jabatan == 'Adm Sales' ? 'selected':'')?>>Adm Sales</option>
						<option value="RSM" <?=($jabatan == 'RSM' ? 'selected':'')?>>RSM</option>
						<option value="ASM" <?=($jabatan == 'ASM' ? 'selected':'')?>>ASM</option>
						<option value="HRD" <?=($jabatan == 'HRD' ? 'selected':'')?>>HRD</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="">Alamat</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="{alamat}" <?=($user_jabatan != 'HRD' ? 'disabled':'')?> required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="">Password</label>
				<div class="col-md-7">
					<input type="password" class="form-control" id="password" placeholder="Password" name="password" value="" <?=($user_jabatan != 'HRD' ? 'disabled':'')?> required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="">Password Confirmation</label>
				<div class="col-md-7">
					<input type="password" class="form-control" id="password_confirmation" placeholder="Password Confirmation" name="password_confirmation" value="" <?=($user_jabatan != 'HRD' ? 'disabled':'')?> required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="">Mac Address</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="macaddress" placeholder="Mac Address" name="macaddress" value="{macaddress}" <?=($user_jabatan != 'HRD' ? 'disabled':'')?> required="" aria-required="true">
				</div>
			</div>
			<?php if($user_jabatan == 'HRD') { ?>
			<div class="form-group">
				<div class="col-md-9 col-md-offset-3">
					<button class="btn btn-success" type="submit">Simpan</button>
					<a href="{base_url}mpegawai" class="btn btn-default" type="reset"><i class="pg-close"></i> Batal</a>
				</div>
			</div>
			<? } ?>
			<?php echo form_hidden('id', $id); ?>
			<?php echo form_close() ?>
	</div>
</div>
