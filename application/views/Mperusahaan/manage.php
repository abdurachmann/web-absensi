<?php echo errorSuccess($this->session)?>
<?php if($error != '') echo errorMessage($error)?>

<style type="text/css" media="screen">
	.map_canvas {
		width: 100%;
		height: 250px;
	}
</style>

<div class="block">
	<div class="block-header">
		<ul class="block-options">
			<li>
				<a href="{base_url}mperusahaan" class="btn"><i class="fa fa-reply"></i></a>
			</li>
		</ul>
		<h3 class="block-title">{title}</h3>
	</div>
	<div class="block-content block-content-narrow">
		<?php echo form_open('mperusahaan/save','class="form-horizontal push-10-t"') ?>
		<div class="form-group">
			<label class="col-md-3 control-label" for="nama">Nama Perusahaan</label>
			<div class="col-md-7">
				<input type="text" class="form-control" id="nama" placeholder="Nama Perusahaan" name="nama" value="{nama}" required="" aria-required="true" disabled>
			</div>
		</div>

		<? ($latitude && $longitude) ? $valueMaps = '{latitude},{longitude}' : $valueMaps = 'Jl. Mega Asri 1, Sukaraja, Cicendo, Kota Bandung, Jawa Barat 40175, Indonesia'; ?>

		<div class="form-group">
			<label class="col-md-3 control-label" for="nama">Alamat</label>
			<div class="col-md-9 row">
				<div class="col-md-7">
					<input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="<?= $valueMaps ?>" required="" aria-required="true">
				</div>
				<div class="col-md-2">
					<input type="button" id="find" class="btn btn-warning btn-block mb-3" value="Cari">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="nama"></label>
			<div class="col-md-7">
				<div class="box p-1">
					<div class="map_canvas">i</div>
					Google Maps
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label" for="nama">Latitude</label>
			<div class="col-md-7">
				<input type="text" class="form-control" id="latitude" readonly placeholder="Latitude" name="latitude" value="{latitude}" required="" aria-required="true" disabled>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="nama">Longitude</label>
			<div class="col-md-7">
				<input type="text" class="form-control" id="longitude" readonly placeholder="Longitude" name="longitude" value="{longitude}" required="" aria-required="true" disabled>
			</div>
		</div>
		<?php echo form_hidden('id', $id); ?>
		<?php echo form_close() ?>
	</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5OAXrBY29rOI84KCADn_IAQXUgaqNo4Q&sensor=false&amp;libraries=places,geometry,drawing&amp;ext=.js"></script>
<script src="{base_url}assets/js/plugins/jquery.geocomplete/jquery.geocomplete.js"></script>
<script type="text/javascript">
	$(function() {
		$("#alamat").geocomplete({
			map: ".map_canvas",
			details: "form ",
			markerOptions: {
				draggable: true
			},
			mapOptions: {
				zoom: 99,
			},
			maxZoom: 99,
		});

		$("#alamat").bind("geocode:dragged", function(event, latLng) {
			$("#latitude").val(latLng.lat());
			$("#longitude").val(latLng.lng());
		});

		$("#reset").click(function() {
			$("#alamat").geocomplete("resetMarker");
			return false;
		});

		$("#find").click(function() {
			$("#alamat").trigger("geocode");
		}).click();
	});
</script>
