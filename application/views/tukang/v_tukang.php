<div class="row">
	<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">Tukang Toko
			<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
		<div class="panel-body">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tukang_toko">Tambah</button>
			<div class="table-responsive">
			<table class="table table-hover">
			  <tr>
			  	<th>No</th>
			  	<th>Nama</th>
			  	<th>Spesialis</th>
			  	<th>Pengalaman Kerja</th>
			  	<th>No. Telepon</th>
			  	<th>Aksi</th>
			  </tr>
			  <?php $i = 1; ?>
			  <?php if(!empty($tukang_toko)) { ?>
			  <?php foreach($tukang_toko as $tt) : ?>
			  <tr>
			  	<td><?= $i++ ?></td>
			  	<td><?= $tt->nama ?></td>
			  	<td><?= $tt->spesialis ?></td>
			  	<td><?= $tt->pengalaman_kerja ?></td>
			  	<td><?= $tt->no_telpon_tt ?></td>
			  	<td>
			  		<a href="">update</a> |
			  		<a href="">delete</a>
			  	</td>
			  </tr>
			<?php endforeach; ?>
		<?php } else { ?>
			<tr>
				<td colspan="5" align="center">Belum ada data!</td>
			</tr>
		<?php } ?>
		</table>