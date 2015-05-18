<div class="box">
<!--    <div class="box-header">-->
<!--        <h3 class="box-title">--><?php //echo $judul_halaman; ?><!--</h3>-->
<!--    </div><!-- /.box-header -->
    <?php if($this->uri->segment(4)<=1){ ?>
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <td colspan="2" style="background-color: #3C8DBC; color: #ffffff;"><i class="fa fa-comments"></i> <?php echo $time; ?></td>
            </tr>
            <tr>
                <td style="width: 170px;background-color: whitesmoke; text-align: center; font-family: arial, helvetica, clean, sans-serif">
                    <img src="<?php echo base_url(); ?>uploads/profile/<?php echo $userfoto;?>" style="width: 80px; height: 80px; " ><br/>
                    <?php echo $username; ?><br/>
                    <?php echo $userhp; ?><br/>
                    <?php echo $useremail; ?>
                </td>
                <td style="background-color: #ffffff; ">
                    <h4 style="text-align: center; font-family: arial, helvetica, clean, sans-serif bold;"><?php echo $title; ?></h4>
                    <hr align="center">
                    <?php echo $topik; ?>
                </td>
            </tr>
        </table>
<!--    </div><!-- /.box-body -->
    <?php } ?>
    <?php if(!empty($all_topik_reply)){ ?>
<!--    <div class="box-body table-responsive">-->
        <table class="table table-bordered table-striped">
            <?php
            foreach ($all_topik_reply as $db):
            ?>
            <tr>
                <td colspan="2" style="background-color: #3C8DBC; color: #ffffff;"><i class="fa fa-comments"></i> <?php echo $db->reply_time; ?></td>
            </tr>
            <tr>
                <td style="width: 170px;background-color: whitesmoke; text-align: center; font-family: arial, helvetica, clean, sans-serif">
                    <img src="<?php echo base_url(); ?>uploads/profile/<?php echo $db->foto;?>" style="width: 80px; height: 80px; " ><br/>
                    <?php echo $db->nama_lengkap; ?><br/>
                    <?php echo $db->hp; ?><br/>
                    <?php echo $db->email; ?>
                </td>
                <td style="background-color: #ffffff; ">
                    <?php echo $db->reply_post; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div><!-- /.box-body -->
    <?php } ?>
    <table class="table">
        <tr>
            <td style="text-align: left; background-color: #ffffff;">
                <a href="<?php echo base_url();?>topik/post_reply/<?php echo $code;?>">
                    <button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> &nbsp;Post Reply</button>
                </a>
            </td>
            <td style="text-align: right; background-color: #ffffff;" ><?php echo $links; ?></td>
        </tr>
    </table>
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
