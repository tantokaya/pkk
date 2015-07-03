<a href="#" class="logo">
    <!-- Add the class icon to your logo image or logo icon to add the margining -->
    Puskomkreatif-UMKM
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<div class="navbar-right">
<ul class="nav navbar-nav">
    <?php if($this->session->userdata('id_level')=='01') { ?>
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-warning"></i>
                <span class="label label-warning"><?php echo $this->app_model->HitungJmlKomen(); ?></span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">Anda memiliki <?php echo $this->app_model->HitungJmlKomen(); ?> Komentar No Publish</li>
                <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <?php foreach($all_new_komen_publish as $db): ?>
                        <li>
                            <a href="<?php echo base_url();?>komentar/edit/<?php echo $db['komen_id'];?>">
                                <i class="ion ion-ios7-people info"></i> <?php echo $db['komen_name']; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="footer"><a href="#">Lihat Semua</a></li>
            </ul>
        </li>
    <!-- Messages: style can be found in dropdown.less-->
    <?php if($this->app_model->HitungPostByJudul()!='0'){ ?>
    <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope"></i>
                <span class="label label-danger"><?php echo $this->app_model->HitungPostByJudul(); ?></span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">Anda Belum Mem-publish <?php echo $this->app_model->HitungPostByJudul();?> Post</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <?php foreach($all_new_post_publish as $db): ?>
                    <li><!-- start message -->
                        <a href="<?php echo base_url();?>post/edit/<?php echo $db['post_id'];?>">
                            <div class="pull-left">
                                <img src="<?php echo base_url(); ?>uploads/profile/<?php echo $db['foto']; ?>" class="img-circle" alt="User Image"/>
                            </div>
                            <h4>
                                <?php echo $db['username']; ?>
<!--                                <small><i class="fa fa-clock-o"></i></small>-->
                            </h4>
                            <p><?php echo $db['post_judul']; ?></p>
                        </a>
                    </li><!-- end message -->
                    <?php endforeach; ?>
                </ul>
            </li>
            <li class="footer"><a href="<?php echo base_url();?>post">Lihat semua Post Berita</a></li>
        </ul>
    </li>
    <?php } } ?>
<!-- Notifications: style can be found in dropdown.less -->

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-user"></i>
        <span><?php echo $this->app_model->CariUserPengguna();?> <i class="caret"></i></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header bg-light-blue">
            <img src="<?php echo base_url(); ?>uploads/profile/thumbs/<?php echo $this->app_model->CariFotoPengguna();?>" class="img-circle" alt="User Image" />
            <p>
                <?php echo $this->app_model->CariUserPengguna();?>
                <small>Active</small>
            </p>
        </li>
        <!-- Menu Body -->
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="<?php echo base_url();?>pengguna/edit/<?php echo $this->app_model->CariUserPengguna();?>" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="<?php echo base_url(); ?>adpus/logout" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
</ul>
</div>
</nav>