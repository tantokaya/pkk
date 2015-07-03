<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?php echo $judul_halaman; ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Username</th>
                <th style="text-align: center;">Nama Pengguna</th>
                <th style="text-align: center;">Level</th>
                <th style="text-align: center;">Cabang</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if($data->num_rows()>0){
                $no =1;
                foreach($data->result_array() as $db){
                    $level = $this->app_model->CariLevel($db['id_level']);
                    $cabang = $this->app_model->CariCabang($db['cabang_id']);

                    ?>
                    <tr>
                        <td style="text-align: center; width: 30px;"><?php echo $no; ?></td>
                        <td style="text-align: center;" ><?php echo $db['username']; ?></td>
                        <td ><?php echo $db['nama_lengkap']; ?></td>
                        <td ><?php echo $db['id_level'].' - '.$level; ?></td>
                        <td ><?php echo $cabang; ?></td>
                        <td style="text-align: center; width: 130px;">
                            <a href="<?php echo base_url();?>pengguna/edit/<?php echo $db['username'];?>" rel="tooltip" title="Edit">
                                <button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Ubah</button>
                            </a>
                            <a href="<?php echo base_url();?>pengguna/hapus/<?php echo $db['username'];?>"
                               onClick="return confirm('Anda yakin ingin menghapus data ini?')" rel="tooltip" title="Hapus">
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $no++; }
                     }
                ?>

            </tbody>
            <tfoot>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Pengguna</th>
                <th>Level</th>
                <th>Cabang</th>
                <th>Aksi</th>
            </tr>
            </tfoot>
        </table>
        <div class="box-footer">
            <a href="<?php echo base_url();?>pengguna/tambah" ><button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</button></a>
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