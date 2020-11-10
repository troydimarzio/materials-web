<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  <div class="profile-sidebar">
    <div class="profile-userpic">
      <img src="<?= base_url('assets/img/upload/profil/') . $this->session->userdata('photo') ?>" class="img-responsive" alt="foto-profile">
    </div>
    <div class="profile-usertitle">
      <div class="profile-usertitle-name"><?= $this->session->userdata('nama'); ?></div>
      <h6><b><?= $this->session->userdata('level'); ?></b></h6>
    </div>
    <div class="clear"></div>
  </div>
  <div class="divider"></div>
  <form role="search">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Search">
    </div>
  </form>

  <ul class="nav menu">
    <?php if($_SESSION['level'] == 'Administrator' || $_SESSION['level'] == 'Tukang' || $_SESSION['level'] == 'Toko/Pabrik') { ?>
      <li <?= $this->uri->segment(1) == 'home' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
        <a href="<?= base_url('home') ?>"><em class="fa fa-home">&nbsp;</em> Halaman utama</a>
      </li>
    <?php } ?>

    <?php if($_SESSION['level'] == 'Administrator') { ?>
      <li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>>
        <a href="<?= base_url('user') ?>"><em class="fa fa-users">&nbsp;</em> Kelola user</a>
      </li>
    <?php } ?>

    <?php if($_SESSION['level'] == 'Toko/Pabrik' || $_SESSION['level'] == 'Tukang') { ?>
      <li <?= $this->uri->segment(1) == 'profil' ? 'class="active"' : '' ?>>
        <a href="<?= base_url('profil') ?>"><em class="fa fa-user">&nbsp;</em> Profil</a>
      </li>
    <?php } ?>

    <?php if($_SESSION['level'] == 'Toko/Pabrik') { ?>
      <li <?= $this->uri->segment(1) == 'material' ? 'class="active"' : '' ?>>
        <a href="<?= base_url('material') ?>"><em class="fa fa-table">&nbsp;</em> Data Material</a>
      </li>
    <?php } ?>

    <?php if($_SESSION['level'] == 'Toko/Pabrik' || $_SESSION['level'] == 'Kurir') { ?>
      <li <?= $this->uri->segment(1) == 'transaksi' ? 'class="active"' : '' ?>>
        <a href="<?= base_url('transaksi') ?>"><em class="fa fa-money">&nbsp;</em> Transaksi</a>
      </li>
    <?php } ?>

    <?php if($_SESSION['level'] == 'Toko/Pabrik') { ?>
      <li <?= $this->uri->segment(1) == 'kurir' ? 'class="active"' : '' ?>>
        <a href="<?= base_url('kurir') ?>"><em class="fa fa-car">&nbsp;</em> Kurir</a>
      </li>
    <?php } ?>

    <?php if($_SESSION['level'] == 'Toko/Pabrik') { ?>
      <li <?= $this->uri->segment(1) == 'tukang' ? 'class="active"' : '' ?>>
        <a href="<?= base_url('tukang') ?>"><em class="fa fa-male">&nbsp;</em> Tukang</a>
      </li>
    <?php } ?>

    <?php //if($_SESSION['level'] == 'Administrator') { ?>
      <!-- <li class="parent"><a data-toggle="collapse" href="#sub-item-1">
        <em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-1">
          <li><a class="" href="#">
            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
          </a></li>
          <li><a class="" href="#">
            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
          </a></li>
          <li><a class="" href="#">
            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
          </a></li>
        </ul>
      </li> -->
    <?php //} ?>
    </ul>
</div><!--/.sidebar-->