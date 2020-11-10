	<div class="row">
		<div class="text-center brand">Materials</div> <br>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Masuk</div>
				<div class="panel-body">
					<?= $this->session->flashdata('pesan_alert'); ?>
					<form role="form" method="post" action="<?= base_url('auth') ?>">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="text" value="<?= set_value('email') ?>">
								<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" />
								<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
							</div>
							<button type="submit" class="btn btn-primary">Masuk</button>
						</fieldset>
					</form>
					<br><br>
					<a href="">Lupa password?</a> <br>
					<a href="<?= base_url('auth/regis') ?>">Belum punya akun? Daftar</a>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	