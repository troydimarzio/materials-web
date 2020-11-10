<div class="row">
	<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">Menu
			<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
		<div class="panel-body">
			<button type="button" class="btn btn-sm bg-primary" data-toggle="modal" onclick="menu()" data-target="#menu">Tambah</button>
			<table class="table table-hover">
			  <tr>
			  	<th>No</th>
			  	<th>Menu</th>
			  	<th>Url</th>
			  	<th>Deskripsi</th>
			  	<th>Icon</th>
			  	<th>Head</th>
			  	<th>Status</th>
			  	<th>Sort</th>
			  	<th>Aksi</th>
			  </tr>
			  <?php $i = 1; ?>
			  <?php if(!empty($menu)) { ?>
			  <?php foreach($menu as $m): ?>
			  <tr>
			  	<td><?= $i++; ?></td>
			  	<td><?= $m->title ?></td>
			  	<td><?= $m->url ?></td>
			  	<td><?= $m->deskripsi_url ?></td>
			  	<td><?= $m->icon_tipe ?></td>
			  	<td><?= $m->caption ?></td>
			  	<td><?= $m->status_menu ?></td>
			  	<td><?= $m->level_sort_menu ?></td>
			  	<td>
			  		<a onclick="menu(
			  			'<?= $m->id_url ?>',
			  			'<?= $m->title ?>',
			  			'<?= $m->url ?>',
			  			'<?= $m->deskripsi_url ?>',
			  			'<?= $m->icon_tipe ?>',
			  			'<?= $m->id_head_menu ?>',
			  			'<?= $m->level_sort_menu ?>'
			  		)" data-toggle="modal" data-target="#menu" class="label label-info">ubah</a>
					<a href="<?= base_url('menu/delete_menu/') . $m->id_url ?>" class="label label-danger" onclick="return confirm('hapus?')">hapus</a>
			  	</td>
			  </tr>
			  <?php endforeach; ?>
			  <?php } else { ?>
			  	<tr><td colspan="9" align="center">Tidak ada data!</td></tr>
			  <?php } ?>
		</table>
		</div>
	</div>
</div>
</div> <!-- row -->