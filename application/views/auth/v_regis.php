	<div class="row">
		<div class="text-center brand">Materials</div> <br>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Daftar</div>
				<div class="panel-body">
					<form role="form" action="<?= base_url('auth/regis') ?>" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Nama Lengkap" name="nama" type="text" autocomplete="off" value="<?= set_value('nama'); ?>">
								<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="text" autocomplete="off" value="<?= set_value('email'); ?>">
								<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" autocomplete="off">
								<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Konfirmasi Password" name="passconf" type="password" autocomplete="off">
								<?= form_error('passconf', '<small class="text-danger">', '</small>'); ?>
							</div>
							<p>Daftar sebagai:</p>
							<div class="form-group">
								<select name="level" class="form-control mb-3">
                    				<option value="default">-- Daftar sebagai --</option>
                    				<?php foreach($level as $lev) { ?>
                        			<option value="<?= $lev->id_level ?>"><?= $lev->level ?></option>
                    				<?php } ?>
                  				</select>
                  			<?php echo form_error('level', '<small class="text-danger">', '</small>') ?>
							</div>
							<button type="submit" class="btn btn-primary">Daftar</button>
						</fieldset>
					</form>
					<br>
					<a href="<?= base_url('auth') ?>">Sudah punya akun? Masuk</a>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	