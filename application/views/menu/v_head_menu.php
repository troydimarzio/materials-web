<div class="row">
	<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">Head menu
			<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
		<div class="panel-body">
			<button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#head_menu" onclick="headMenu()">Tambah</button>
			<table class="table table-hover">
			  <tr>
			  	<th>No</th>
			  	<th>Caption</th>
			  	<th>Status</th>
			  	<th>Sort</th>
			  	<th>Aksi</th>
			  </tr>
			  <?php $i = 1; ?>
			  <?php if(!empty($head_menu)) { ?>
			  <?php foreach($head_menu as $hm): ?>
			  <tr>
			  	<td><?= $i++; ?></td>
			  	<td><?= $hm->caption ?></td>
			  	<td><?= $hm->status ?></td>
			  	<td><?= $hm->level_sort ?></td>
			  	<td>
			  		<a onclick="headMenu(
			  			'<?= $hm->id_head_menu ?>',
			  			'<?= $hm->caption ?>',
			  			'<?= $hm->level_sort ?>',
			  			'<?= $hm->status ?>'
			  		)" data-toggle="modal" data-target="#head_menu" class="label label-info">ubah</a>
					<a href="<?= base_url('menu/delete/') . $hm->id_head_menu ?>" class="label label-danger" onclick="return confirm('hapus?')">hapus</a>
			  	</td>
			  </tr>
			  <?php endforeach; ?>
			  <?php } else { ?>
			  	<tr><td colspan="5" align="center">Tidak ada data!</td></tr>
			  <?php } ?>
		</table>
		</div>
	</div>
</div>
</div>