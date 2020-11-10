<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Profil
				<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-2">
						<?php foreach($profil as $p) { ?>
						<img src="<?= base_url('assets/img/upload/profil/') . $p->photo_profil ?>" alt="Foto Profil" class="img-thumbnail" width="200" height="200">
						<?php } ?>
					</div>
					<div class="col-lg-10">
						<table>
							<?php foreach($profil as $p) { ?>
							<tr>
								<td>Nama</td>
								<td>&nbsp;:&nbsp;</td>
								<td><?= $p->nama_lengkap ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>&nbsp;:&nbsp;</td>
								<td><?= $p->alamat ?></td>
							</tr>

							<span style="cursor: pointer;" data-toggle="modal" data-target="#profil"><em class="fa fa-edit fa-lg" onclick="editProfil(
								'<?= $p->nama_lengkap ?>',
								'<?= $p->alamat ?>'
							);
							"></em></span> <br><br>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php if($this->session->userdata('level') == 'Toko/Pabrik') { ?>
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Profil Toko/Pabrik 
				<span style="cursor: pointer;" onclick="editProfilToko();" class="pull-right panel-toggle" data-toggle="modal" data-target="#profilToko"><em class="fa fa-plus"></em></span></div>
			<div class="panel-body">

				<table>
					<?php foreach($toko as $t) { ?>
					<tr>
						<td>Nama toko/pabrik</td>
						<td>&nbsp;:&nbsp;</td>
						<td><?= $t->nama_penyedia ?></td>
					</tr>
					<tr>
						<td>No. rekening</td>
						<td>&nbsp;:&nbsp;</td>
						<td><?= $t->rekening ?> <b>(<?= $t->bank ?>)</b></td>
					</tr>
					<tr>
						<td>Rating</td>
						<td>&nbsp;:&nbsp;</td>
						<td><?= $t->rating ?></td>
					</tr>

					<span style="cursor: pointer;" data-toggle="modal" data-target="#profilToko" onclick="editProfilToko(
							'<?= $t->id_penyedia ?>',
							'<?= $t->nama_penyedia ?>',
							'<?= $t->rekening ?>',
							'<?= $t->id_bank ?>'
						);
					"><em class="fa fa-edit fa-lg"></em></span> <br><br>
					<?php } ?>
					
				</table>
			</div>
		</div>
	</div>
	<?php } ?>	
</div>

<?php if($this->session->userdata('level') == 'Tukang') { ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Profil Tukang
				<span onclick="editProfilTukang();" style="cursor: pointer;" data-toggle="modal" data-target="#profil_tukang" class="pull-right panel-toggle"><em class="fa fa-plus"></em></span></div>
			<div class="panel-body">
				<table>
					<?php foreach($tukang as $t) { ?>
					<tr>
						<td>Umur</td>
						<td>&nbsp;:&nbsp;</td>
						<td><?= $t->umur ?> Tahun</td>
					</tr>
					<tr>
						<td>Lama Kerja</td>
						<td>&nbsp;:&nbsp;</td>
						<td><?= $t->pengalaman_kerja ?></td>
					</tr>
					<tr>
						<td>Nomor Telepon</td>
						<td>&nbsp;:&nbsp;</td>
						<td><?= $t->no_telpon_tukang ?></td>
					</tr>
					<tr>
						<td>Spesialis</td>
						<td>&nbsp;:&nbsp;</td>
						<td><?= $t->spesialis ?></td>
					</tr>
					<tr>
						<td>Rating</td>
						<td>&nbsp;:&nbsp;</td>
						<td><?= $t->rating ?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>&nbsp;:&nbsp;</td>
						<td><?= $t->status_kerja ?>
							<a href="<?= base_url('profil/bekerja/') . $t->id_tukang ?>"><i class="fa fa-check-square fa-lg"></i></a>
							<a href="<?= base_url('profil/tidak_bekerja/') . $t->id_tukang ?>"><i class="fa fa-window-close fa-lg"></i></a>
						</td>
					</tr>

					<span style="cursor: pointer;" data-toggle="modal" data-target="#profil_tukang" onclick="editProfilTukang(
							'<?= $t->id_tukang ?>',
							'<?= $t->umur ?>',
							'<?= $t->pengalaman_kerja ?>',
							'<?= $t->no_telpon_tukang ?>',
							'<?= $t->id_spesialis ?>'
						);
					"><em class="fa fa-edit fa-lg"></em></span> <br><br>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php } ?>