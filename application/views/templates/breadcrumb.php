  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active"><?= ucfirst($breadcrumb) ?></li>
      </ol>
      <?= $this->session->flashdata('pesan_alert') ?>
    </div><!--/.row--> <br><br>