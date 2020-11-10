<div class="row">
  <div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">Material
      <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
    <div class="panel-body">
      <form action="" method="post" class="form-inline">
        <div class="form-group">
          <input type="text" name="keyword" placeholder="cari data material .." class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
      </form> <br>
      <?php if($this->session->userdata('level') == 'Toko/Pabrik') { ?>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#material" onclick="editMaterial()">Tambah</button>
      <?php } ?>
      <br>
      <div class="table-responsive">
      <table class="table table-hover">
        <tr>
          <th>No</th>
          <th>Foto</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Deskripsi</th>
          <th>Kategori</th>
          <?php if($this->session->userdata('level') == 'Administrator') { ?><th>Toko/Pabrik</th><?php } ?>
          <th>Aksi</th>
        </tr>
        <?php $i = $this->uri->segment(3) + 1; ?>
        <?php if(!empty($material)) { ?>
        <?php foreach($material as $m): ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><img src="<?= base_url('assets/img/upload/material/') . $m->photo_material ?>" width="100" height="100" alt="foto"></td>
          <td><?= $m->nama_material ?></td>
          <td>Rp.<?= $m->harga ?></td>
          <td><?= $m->stok ?> <?= $m->satuan ?></td>
          <td><?= $m->deskripsi ?></td>
          <td><?= $m->kategori ?></td>
          <?php if($this->session->userdata('level') == 'Administrator') { ?><td><?= $m->nama_penyedia ?></td><?php } ?>
          <td>
            <?php if($this->session->userdata('level') == 'Toko/Pabrik') { ?>
            <a data-toggle="modal" data-target="#material" class="label label-info" onclick="editMaterial(
                '<?= $m->id_material ?>',
                '<?= $m->nama_material ?>',
                '<?= $m->harga ?>',
                '<?= $m->stok ?>',
                '<?= $m->id_satuan ?>',
                '<?= $m->deskripsi ?>',
                '<?= $m->id_kategori ?>'
            );
            ">ubah</a>
            <?php } ?>
            <a href="<?= base_url('material/deleteMaterial/') . $m->id_material ?>" class="label label-danger" onclick="return confirm('hapus?')">hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php } else { ?>
          <tr><td colspan="9" align="center">Belum ada yg dijual!</td></tr>
        <?php } ?>
    </table>
    