<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url(); ?>uploads/profile/<?php echo $this->app_model->CariFotoPengguna();?>" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>Hello, <?php echo $this->app_model->CariUserPengguna();?></p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <!--<form action="#" method="" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
        </div>
    </form>-->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="<?php if($judul == 'dashboard') echo 'active';?>">
            <a href="<?php echo base_url();?>adpus/home">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview <?php if($judul == 'add_tag'||$judul == 'list_tag'||$judul == 'add_sensor'||$judul == 'list_sensor'
            ||$judul == 'add_kategori'||$judul == 'list_kategori'||$judul == 'add_komentar'||$judul == 'list_komentar'
            ||$judul == 'add_post'||$judul == 'list_post') echo 'active'; ?>">
            <a href="#">
                <i class="glyphicon glyphicon-pushpin"></i> <span>Post</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>post"><i class="fa fa-angle-double-right"></i> Daftar Post</a></li>
                <li><a href="<?php echo base_url();?>post/tambah"><i class="fa fa-angle-double-right"></i> Tambah Post</a></li>
                <li><a href="<?php echo base_url();?>tag"><i class="fa fa-angle-double-right"></i> Tag</a></li>
            </ul>
        </li>
        <li class="treeview <?php if($judul == 'list_agenda' || $judul == 'add_agenda' || $judul == 'edit_agenda') echo 'active';?>">
            <a href="#">
                <i class="fa fa-tasks"></i> <span>Kegiatan</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>agenda"><i class="fa fa-angle-double-right"></i> Agenda</a></li>
                <li><a href="<?php echo base_url();?>agenda/tambah"><i class="fa fa-angle-double-right"></i> Tambah Agenda</a></li>
                <li><a href="<?php echo base_url();?>kalender"><i class="fa fa-angle-double-right"></i> Kalender Agenda</a></li>
            </ul>
        </li>
        <li class="treeview <?php if($judul == 'list_topik' || $judul == 'tambah_topik'||$judul=='list_forum'
            ||$judul=='forum_perkenalan'||$judul=='forum_pengumuman'||$judul=='forum_saran'||$judul=='forum_pojok'
            ||$judul=='detail_topik') echo 'active' ?>">
            <a href="#">
                <i class="glyphicon glyphicon-bullhorn"></i> <span>Forum</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>forum"><i class="fa fa-angle-double-right"></i> Ruang Forum Diskusi</a></li>
                <li><a href="<?php echo base_url();?>topik"><i class="fa fa-angle-double-right"></i> All Topik</a></li>
                <li><a href="<?php echo base_url();?>topik/tambah"><i class="fa fa-angle-double-right"></i> Tambah Topik</a></li>
            </ul>
        </li>
    </ul>
</section>