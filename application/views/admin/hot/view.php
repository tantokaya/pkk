<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?php echo $judul_halaman; ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th style="text-align: center; width: 30px;">No</th>
                <th style="text-align: center; width: 300px;">Hot News</th>
                <th style="text-align: center; width: 50px;">Tgl Update</th>
                <th style="text-align: center; width: 50px;">Waktu Update</th>
                <th style="text-align: center; width: 50px;">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no =1;
            foreach ($all_hot as $db):
                ?>
                <tr>
                    <td style="text-align: center"><?php echo $no; ?></td>
                    <td><?php echo $db['hot_news']; ?></td>
                    <td style="text-align: center;"><?php echo $this->app_model->tgl_indo($db['hot_date']); ?></td>
                    <td style="text-align: center;"><?php echo $db['hot_time']; ?></td>
                    <td style="text-align: center;">
                        <a href="<?php echo base_url();?>hot/edit/<?php echo $db['hot_id'];?>" title="Edit">
                            <button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Ubah</button></a>
                        </a>
                        <a href="<?php echo base_url();?>hot/hapus/<?php echo $db['hot_id'];?>"
                           onClick="return confirm('Anda yakin ingin menghapus data ini?')" title="Hapus">
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</button></a>
                        </a>
                    </td>
                </tr>
                <?php
                $no++;
            endforeach;
            ?>
            </tbody>
            <tfoot>
            <tr>
                <th style="text-align: center; width: 30px;">No</th>
                <th style="text-align: center; width: 300px;">Hot News</th>
                <th style="text-align: center; width: 50px;">Tgl Update</th>
                <th style="text-align: center; width: 50px;">Waktu Update</th>
                <th style="text-align: center; width: 50px;">Aksi</th>
            </tr>
            </tfoot>
        </table>
        <div class="box-footer">
            <a href="<?php echo base_url();?>hot/tambah" ><button type="submit" class="btn btn-warning"><i class="fa fa-plus-circle"></i> &nbsp;Tambah</button></a>
        </div>
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