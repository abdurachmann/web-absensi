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
		<?php echo form_open('mpegawai/save','class="form-horizontal push-10-t"') ?>
			<div class="form-group">
				<label class="col-md-3 control-label" for="nama">NIK</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" value="{nik}" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="nama">Nama</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{nama}" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="nama">Alamat</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="{alamat}" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="example-hf-email">Password</label>
				<div class="col-md-7">
					<input type="password" class="form-control" id="password" placeholder="Password" name="password" value="" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="example-hf-email">Password Confirmation</label>
				<div class="col-md-7">
					<input type="password" class="form-control" id="password_confirmation" placeholder="Password Confirmation" name="password_confirmation" value="" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="nama">Mac Address</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="macaddress" placeholder="Mac Address" name="macaddress" value="{macaddress}" required="" aria-required="true">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-9 col-md-offset-3">
					<button class="btn btn-success" type="submit">Simpan</button>
					<a href="{base_url}mpegawai" class="btn btn-default" type="reset"><i class="pg-close"></i> Batal</a>
				</div>
			</div>
			<?php echo form_hidden('id', $id); ?>
			<?php echo form_close() ?>
	</div>
</div>
