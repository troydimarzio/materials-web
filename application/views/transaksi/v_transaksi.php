<div class="row">
	<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">Daftar Pemesanan
			<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
		<div class="panel-body">
			<div class="table-responsive">
			<table class="table table-hover">
			  <tr>
			  	<th>No</th>
			  	<th>Nama Material</th>
			  	<th>Nama Pemesan</th>
			  	<th>Alamat</th>
			  	<th>No Telpon</th>
			  	<th>Status Transaksi</th>
			  	<th>Jumlah</th>
			  	<th>Total Harga</th>
			  	<th>Tanggal Pemesanan</th>
			  	<?php if($this->session->userdata('level') == 'Toko/Pabrik') { ?>
			  	<th>Aksi</th>
			  	<?php } ?>
			  	<?php if($this->session->userdata('level') == 'Kurir') { ?>
			  	<th>Konfirmasi</th>
			  	<?php } ?>
			  </tr>
			<?php $i = 1; ?>
		<?php if(!empty($transaksi_all)) { ?>
			<?php foreach($transaksi_all as $t) : ?>
			  <tr>
			  	<td><?= $i++ ?></td>
			  	<td><?= $t->nama_material ?></td>
				<td><?= $t->nama_lengkap ?></td>
				<td><?= $t->alamat ?></td>
				<td><?= $t->no_telpon ?></td>
		  		<?php if($t->id_status == 1) { ?>
		  			<td style="color: #ffa500;">Pending</td>
		  		<?php } ?>
		  		<?php if($t->id_status == 2) { ?>
		  			<td style="color: #00ced1;">Dikonfirmasi</td>
		  		<?php } ?>
		  		<?php if($t->id_status == 3) { ?>
		  			<td style="color: #00ff7f;">Lunas</td>
		  		<?php } ?>
		  		<?php if($t->id_status == 4) { ?>
		  			<td style="color: red;">Gagal</td>
		  		<?php } ?>
		  		<td><?= $t->quantity ?></td>
		  		<td><?= "Rp.".$t->total_harga ?></td>
		  		<td><?= $t->tgl_transaksi ?></td>
		  		<?php if($this->session->userdata('level') == 'Toko/Pabrik') { ?>
			  	<td>
			  		<a href="<?= base_url('transaksi/konfirmasi/') . $t->kd_pemesanan ?>">konfirmasi</a> |
			  		<a href="<?= base_url('transaksi/delete_transaksi/') . $t->kd_pemesanan ?>" onclick="return confirm('hapus?');">hapus</a>
			  	</td>
			  <?php } ?>
			  	<?php if($this->session->userdata('level') == 'Kurir') { ?>
			  	<td>
			  		<a href="<?= base_url('transaksi/konfirmasi_lunas/') . $t->kd_pemesanan ?>">Lunas</a>
			  	</td>
			  <?php } ?>
			  </tr>
			<?php endforeach; ?>
		<?php } else { ?>
				<tr>
					<td colspan="10" align="center">Tidak ada ada!</td>
				</tr>
		<?php } ?>
			</table>
		