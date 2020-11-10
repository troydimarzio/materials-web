<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
      <div class="profile-userpic">
        <img src="<?php echo base_url('assets/img/user.png') ?>" class="img-responsive" alt="foto-profile">
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
    
    <!-- Query management menu -->

        <?php 
            // $id_level = $this->session->userdata('id_level');
            // $queryMenu = "
            //     SELECT `t_head_menu`.`id_head_menu`, `caption`
            //     FROM `t_head_menu` JOIN `t_hak_akses`
            //     ON `t_head_menu`.`id_head_menu` = `t_hak_akses`.`id_head_menu`
            //     WHERE `t_hak_akses`.`id_level` = $id_level
            //     ORDER BY `t_hak_akses`.`id_head_menu` ASC
            // ";

            // $menu = $this->db->query($queryMenu)->result();
         ?>

    <!-- ============================== -->

    <ul class="nav menu">
      <?php //foreach($menu as $m): ?>
          <!-- <span class="label label-primary"><?//= ucfirst($m->caption) ?></span> -->

          <?php 
              //$menuId       = $m->id_head_menu;
              // $querySubMenu = "SELECT * FROM `t_url` WHERE `id_head_menu` = $menuId AND `status_menu` = 1";
              // $subMenu      = $this->db->query($querySubMenu)->result();
           ?>

           <?php //foreach($subMenu as $sm): ?>
            <?php //if(ucfirst($breadcrumb) == ucfirst($sm->title)): ?>
                <li class="active">
              <?php //else: ?>
                <li>
              <?php //endif; ?>
                    <a href="<?//= base_url($sm->url) ?>">
                        <em class="<?//= $sm->icon_tipe ?>">&nbsp;</em> <?//= ucfirst($sm->title) ?>
                    </a>
                </li>
           <?php //endforeach; ?>
      <?php //endforeach; ?>
     
      <!-- <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
        <em class="fa fa-navicon">&nbsp;</em> Tabel Master <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-1">
          <li><a class="" href="#">
            <span class="fa fa-arrow-right">&nbsp;</span> Tabel 1
          </a></li>
          <li><a class="" href="#">
            <span class="fa fa-arrow-right">&nbsp;</span> Tabel 2
          </a></li>
          <li><a class="" href="#">
            <span class="fa fa-arrow-right">&nbsp;</span> Tabel 3
          </a></li>
        </ul>
      </li> -->
    </ul>
</div><!--/.sidebar-->