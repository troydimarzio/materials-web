<div class="row">
	<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">User
			<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
		<div class="panel-body">
			<form action="<?= base_url('user/search') ?>" method="post" class="form-inline">
				<div class="form-group">
					<input type="text" name="keyword" placeholder="cari data user .." class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Cari</button>
			</form>

			<br>
			<div class="table-responsive">
			<table class="table table-hover">
			  <tr>
			  	<th>No</th>
			  	<th>Email</th>
			  	<th>Password</th>
			  	<th></th>
			  	<th>Status</th>
			  	<th>Level</th>
			  	<th>Dibuat</th>
			  	<th>Aksi</th>
			  </tr>
			  <?php $i = $this->uri->segment(3) + 1; ?>
			  <?php if(!empty($user)) { ?>
			  <?php foreach($user as $u): ?>
			  <tr>
			  	<td><?= $i++; ?></td>
			  	<td><?= $u->email ?></td>
				<td><input style="border: none;" type="password" value="<?= $u->password ?>"></td>
				<td>
					<a href="<?= base_url('user/aktif/') . $u->kd_user ?>"><i class="fa fa-check-square"></i></a>
					<a href="<?= base_url('user/nonaktif/') . $u->kd_user ?>"><i class="fa fa-window-close"></i></a>
				</td>
			  	<td class="<?= $u->sts ?>"><?= $u->sts ?></td>
			  	<td><?= $u->level ?></td>
			  	<td><?= $u->date_created ?></td>
			  	<td>
			  		<a onclick="user(
				  		'<?= $u->kd_user ?>',
				  		'<?= $u->email ?>',
				  		'<?= $u->password ?>'
			  		)" data-toggle="modal" data-target="#user" class="label label-info">ubah</a>
					<a href="<?= base_url('user/delete_user/') . $u->kd_user ?>" class="label label-danger" onclick="return confirm('hapus?')">hapus</a>
			  	</td>
			  </tr>
			  <?php endforeach; ?>
			  <?php } else { ?>
			  	<tr><td colspan="7" align="center">Tidak ada data!</td></tr>
			  <?php } ?>
		</table>
		