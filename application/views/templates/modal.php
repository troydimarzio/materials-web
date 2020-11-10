<!-- Modal logout -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logout" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin keluar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary">Keluar</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal add head menu -->
<div class="modal fade" id="head_menu" tabindex="-1" role="dialog" aria-labelledby="head_menu" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Head menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/insert') ?>" method="post">
      <div class="modal-body">
        <div class="row">
          <input type="hidden" name="id" id="id">
          <div class="col col-lg-10">
            <input type="text" name="caption" id="caption" placeholder="Caption" class="form-control" required />
          </div>
          <div class="col col-lg-2">
            <input type="text" name="sort" id="sort" placeholder="Sort" class="form-control" required>
          </div>
        </div>
          <div class="radio">
            <label>
              <input type="radio" name="status" value="1" checked />
              Aktif
            </label>
            <label>
              <input type="radio" name="status" value="0" />
              Nonaktif
            </label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal add menu -->
<div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="menu" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/insert_menu') ?>" method="post">
        <input type="hidden" name="id" id="id_menu">
      <div class="modal-body">
        <div class="row">
          <div class="col col-lg-12">
            <div class="form-group">
              <input type="text" name="menu" id="title" placeholder="Menu" class="form-control" required />
            </div>
            <div class="form-group">
              <input type="text" name="url" id="url" placeholder="Url" class="form-control" required>
            </div>
            <div class="form-group">
              <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <input type="text" name="icon" id="icon" placeholder="Icon" class="form-control" required>
            </div>
            <div class="form-group">
              <select name="head" id="head" class="form-control">
                <option disabled>-- Head menu --</option>
                <?php foreach($head_menu as $hm): ?>
                  <option value="<?= $hm->id_head_menu ?>"><?= $hm->caption ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <div class="radio">
              <label>
                <input type="radio" id="1" name="status" value="1" checked />
                Aktif
              </label>
              <label>
                <input type="radio" id="0" name="status" value="0" />
                Nonaktif
              </label>
            </div>
            </div>
            <div class="form-group">
              <input type="text" name="sort" id="sort_menu" placeholder="Sort" class="form-control" required>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal ubah user -->
<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="user" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('user/ubah_user') ?>" method="post">
        <input type="hidden" name="kd" id="kd">
      <div class="modal-body">
        <div class="row">
          <div class="col col-lg-12">
            <div class="form-group">
              <input type="text" name="email" id="email" placeholder="E-mail" class="form-control" required />
            </div>
            <div class="form-group">
              <input type="text" name="password" id="password" placeholder="Password" class="form-control" required>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal add material -->
<div class="modal fade" id="material" tabindex="-1" role="dialog" aria-labelledby="material" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('material/insertMaterial') ?>
      <div class="modal-body">
        <div class="row">
          <div class="col col-lg-12">
            <div class="form-group">
              <input type="hidden" name="id_penyedia" id="id_penyedia" value="<?= $toko['id_penyedia']; ?>" />
              <input type="hidden" name="id_material" id="id_material" />
              <input type="text" name="nama_material" id="nama_material" placeholder="Nama Material" class="form-control" required />
            </div>
            <div class="form-group">
              <input type="text" name="harga" id="harga" placeholder="Harga" class="form-control" required />
            </div>
            <div class="row">
              <div class="col col-md-6">
                <div class="form-group">
                  <input type="text" name="stok" id="stok" placeholder="Stok" class="form-control" required />
                </div>
              </div>
              <div class="col col-md-6">
                <select name="satuan" id="satuan" class="form-control" required>
                  <?php foreach($satuan as $s) { ?>
                    <option value="<?= $s->id_satuan ?>"><?= $s->satuan ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <textarea name="deskripsi" id="deskripsi_m" cols="30" rows="5" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              Masukkan Foto:
              <input type="file" name="fotto" id="foto_material" class="form-control" />
            </div>
            <div class="form-group">
              <select name="kategori" id="kategori" class="form-control" required>
                <option>Pilih Kategori</option>
                  <?php foreach($kategori as $k) { ?>
                    <option value="<?= $k->id_kategori ?>"><?= $k->kategori ?></option>
                  <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal buat profil toko -->
<div class="modal fade" id="profilToko" tabindex="-1" role="dialog" aria-labelledby="profilToko" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profil Toko/Pabrik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('profil/insertProfilToko') ?>" method="post">
        <input type="hidden" name="id_toko" id="id_toko">
        <input type="hidden" name="id_biodata" value="<?= $this->session->userdata('id_biodata') ?>">
      <div class="modal-body">
        <div class="row">
          <div class="col col-lg-12">
            <div class="form-group">
              <input type="text" name="nama_toko" id="nama_toko" placeholder="Nama Toko/Pabrik" class="form-control" required />
            </div>
            <div class="form-group">
              <input type="text" name="rekening" id="rekening" placeholder="No. Rekening" class="form-control" required>
            </div>
            <div class="form-group">
              <select name="bank" id="bank" class="form-control">
                <?php foreach($bank as $b) { ?>
                <option value="<?= $b->id_bank ?>"><?= $b->bank ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal edit profil -->
<div class="modal fade" id="profil" tabindex="-1" role="dialog" aria-labelledby="profil" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('profil/editProfil') ?>
        <input type="hidden" name="id_biodata" value="<?= $this->session->userdata('id_biodata') ?>">
      <div class="modal-body">
        <div class="row">
          <div class="col col-lg-12">
            <div class="form-group">
              <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" class="form-control" required>
            </div>
            <div class="form-group">
              <input type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control" required>
            </div>
            <div class="form-group">
              Foto Profil: <input type="file" name="foto" id="foto" class="form-control" />
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal edit profil tukang -->
<div class="modal fade" id="profil_tukang" tabindex="-1" role="dialog" aria-labelledby="profil_tukang" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profil Tukang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('profil/profilTukang') ?>" method="post">
        <input type="hidden" name="id_tukang" id="qwerty">
        <input type="hidden" name="id_biodata" value="<?= $this->session->userdata('id_biodata') ?>">
      <div class="modal-body">
        <div class="row">
          <div class="col col-lg-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <input type="number" name="umur" id="umur" placeholder="Umur" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                      <input type="text" name="no_telpon" id="no_telponnn" placeholder="No Telepon" class="form-control" required />
                    </div>
                </div>
            </div>
                    <div class="form-group">
                      <textarea name="lama_kerja" id="lama_kerja" cols="30" rows="10" class="form-control" required>
                        
                      </textarea>
                    </div>
            <div class="form-group">
              Spesialis:
                <select name="spesialis" class="form-control" id="spesialis">
                  <?php foreach($spesialis as $s) { ?>
                    <option value="<?= $s->id_spesialis ?>"><?= $s->spesialis ?></option>
                  <?php } ?>
                </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal add kurir -->
<div class="modal fade" id="kurir" tabindex="-1" role="dialog" aria-labelledby="kurir" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah kurir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('kurir/insert') ?>" method="post">
      <div class="modal-body">
        <div class="row">
          <!-- <input type="text" name="id_penyedia" id="id"> -->
          <div class="col col-lg-6">
            <input type="text" name="email" id="email" placeholder="Email" class="form-control" required />
          </div>
          <div class="col col-lg-6">
            <input type="text" name="password" id="password" placeholder="Password" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal add tukang toko -->
<div class="modal fade" id="tukang_toko" tabindex="-1" role="dialog" aria-labelledby="tukang_toko" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Tukang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('tukang/insert') ?>" method="post">
      <div class="modal-body">
          <input type="text" name="id_tt" id="id_tt">
          <input type="text" name="toko_tt" id="toko_tt" value="<?= $this->session->userdata('kd_user') ?>">
          <div class="form-group">
            <input type="text" name="nama_tt" id="nama_tt" placeholder="Nama Tukang" class="form-control" required />
          </div>
          <div class="form-group">
            <textarea name="pk_tt" id="pk_tt" cols="30" rows="6" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="no_telpon_tt" id="no_telpon_tt" placeholder="Nomor Telepon" class="form-control" required />
          </div>
          <div class="form-group">
            <select name="spesialis_tt" id="spesialis_tt" class="form-control">
            <?php foreach($spesialis_tt as $stt) : ?>
            <option value="<?= $stt->id_spesialis ?>"><?= $stt->spesialis ?></option>
          <?php endforeach; ?>
          </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>