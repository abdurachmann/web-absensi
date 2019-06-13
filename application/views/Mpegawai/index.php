<?php echo errorSuccess($this->session)?>
<?php if($error != '') echo errorM_mssage($error)?>

<div class="block">
	<div class="block-header">
		<ul class="block-options">
        <li>
            <a href="{base_url}mpegawai/create" class="btn"><i class="fa fa-plus"></i></a>
        </li>
    </ul>
		<h3 class="block-title">{title}</h3>
	</div>
	<div class="block-content">
		<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
		<table class="table table-bordered table-striped js-dataTable-full">
			<thead>
				<tr>
					<th>No</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Mac Address</th>
					<th>Username</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $number=0; ?>
				<?php foreach($list_index as $row){ ?>
				<?php $number=$number+1; ?>
				<tr>
					<td><?=$number?></td>
					<td><?=$row->nik?></td>
					<td><?=$row->nama?></td>
					<td><?=$row->alamat?></td>
					<td><?=$row->macaddress?></td>
					<td><?=$row->username?></td>
					<td>
						<div class="btn-group">
							<a href="{base_url}mpegawai/update/<?=$row->id?>" data-toggle="tooltip" title="Ubah"><i class="fa fa-pencil"></i></a>&nbsp;
							<a href="{base_url}mpegawai/delete/<?=$row->id?>" data-toggle="tooltip" title="Hapus" onclick="return confirm('Anda yakin data akan dihapus ?');"><i class="fa fa-trash-o"></i></a>
						</div>
					</td>
				</tr>
				<? } ?>
			</tbody>
		</table>
	</div>
</div>
