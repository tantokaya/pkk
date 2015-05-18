<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?php echo $judul_halaman; ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr class='thefilter'>
                <th>No</th>
                <th>Judul</th>
                <th>Balasan</th>
                <th>Penulis</th>
                <th>Kali dilihat</th>
                <th>Pesan Terakhir</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no =1;
            foreach ($all_forum as $db):
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><a href="<?php echo base_url();?>index.php/topik/detail/<?php echo $db['topik_id'];?>"> <?php echo $db['topik_title']; ?></a></td>
                    <td></td>
                    <td><?php echo $db['username']; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                $no++;
            endforeach;
            ?>
            </tbody>
            <tfoot>
            <tr class='thefilter'>
                <th>No</th>
                <th>Judul</th>
                <th>Balasan</th>
                <th>Penulis</th>
                <th>Kali dilihat</th>
                <th>Pesan Terakhir</th>
            </tr>
            </tfoot>
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


<!-- page script -->
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>