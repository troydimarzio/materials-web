<div class="row">
	<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">Kurir
			<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
		<div class="panel-body">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kurir">Tambah</button>
			<div class="table-responsive">
			<table class="table table-hover">
			  <tr>
			  	<th>No</th>
			  	<th>Email</th>
			  	<th>Password</th>
			  </tr>
			  <?php $i = 1; ?>
			  <?php if(!empty($kurir)) { ?>
			  <?php foreach($kurir as $k) : ?>
			  <tr>
			  	<td><?= $i++ ?></td>
			  	<td><?= $k->email ?></td>
			  	<td><?= $k->password ?></td>
			  </tr>
			<?php endforeach; ?>
		<?php } else { ?>
			<tr>
				<td colspan="3" align="center">Belum ada data!</td>
			</tr>
		<?php } ?>
		</table>
		