<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?php echo $judul_halaman; ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body table-striped">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>topik</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><a href="<?php echo base_url();?>forum/perkenalan"><i class="fa fa-fw fa-rss"></i></a> </td>
                <td>
                    <a href="<?php echo base_url();?>forum/perkenalan"><b>Selamat Datang & Perkenalan</b><br/></a>
                    <p style="font-size: 12px">Selamat datang di Forum Komunitas Teknopark - Silahkan perkenalkan diri anda di sini. </p><br/>
                    <p style="font-size: 11px">Pesan Terakhir - </p>
                </td>
                <td><p style="font-size: 15px"><?php echo $jml_topik_perkenalan; ?></p></td>
            </tr>
            <tr>
                <td><a href="<?php echo base_url();?>forum/pengumuman"><i class="glyphicon glyphicon-bullhorn"></i> </a> </td>
                <td>
                    <a href="<?php echo base_url();?>forum/pengumuman"><b>Pengumuman</b></a>
                    <p style="font-size: 12px">Pengumuman dari Kegiatan Puskomkreatif.</p><br/>
                    <p style="font-size: 11px">Pesan Terakhir -</p>
                </td>
                <td><p style="font-size: 15px"></p><?php echo $jml_topik_pengumuman; ?></td>
            </tr>
            <tr>
                <td><a href="<?php echo base_url();?>forum/saran"><i class="glyphicon glyphicon-tags"></i> </a> </td>
                <td>
                    <a href="<?php echo base_url();?>index.php/forum/saran"><b>Saran untuk forum</b></a>
                    <p style="font-size: 12px">Pengguna yang sudah terdaftar dapat memberikan saran dan kritik mengenai Forum Komunitas Puskomkreatif ini. </p><br/>
                    <p style="font-size: 11px">Pesan Terakhir - </p>
                </td>
                <td><p style="font-size: 15px"><?php echo $jml_topik_saran; ?></p></td>
            </tr>
            <tr>
                <td><a href="<?php echo base_url();?>forum/pojok"><i class="fa fa-users"></i> </a> </td>
                <td>
                    <a href="<?php echo base_url();?>forum/pojok"><b>Pojok Komunitas</b></a>
                    <p style="font-size: 12px">Pengguna yang sudah terdaftar dapat berdiskusi, diskusi dengan topik yang umum dan tentu saja saling mengenal antara pengguna forum ini. </p><br/>
                    <p style="font-size: 11px">Pesan Terakhir - </p>
                </td>
                <td><p style="font-size: 15px"><?php echo $jml_topik_pojok; ?></p></td>
            </tr>
            </tbody>

        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
<!-- jQuery 2.0.2 -->
<script src="<?php echo base_url();?>asset/admin/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>asset/admin/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>asset/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>asset/admin/js/AdminLTE/app.js" type="text/javascript"></script>

