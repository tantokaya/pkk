<div class="box">
<div class="box-header">
    <h3 class="box-title"><?php echo $judul_halaman; ?></h3>
</div><!-- /.box-header -->
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th width="10">No</th>
        <th width="200">Acara</th>
        <th width="80">Lokasi</th>
        <th width="50">Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no =1;
    foreach ($all_agenda as $db):
        ?>
        <tr>
            <td style="text-align: center"><?php echo $no; ?></td>
            <td><?php echo $db['agenda_name']; ?></td>
            <td><?php echo $db['agenda_lokasi']; ?></td>
            <td align="center">
                <?php if($this->session->userdata('id_level')=='01') { ?>
                <a href="<?php echo base_url();?>index.php/agenda/edit/<?php echo $db['agenda_code'];?>" title="Edit">
                    <button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Ubah</button></a>
                </a>

                <a href="<?php echo base_url();?>agenda/hapus/<?php echo $db['agenda_code'];?>"
                   onClick="return confirm('Anda yakin ingin menghapus data ini?')" title="Hapus">
                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</button></a>
                </a>
                <?php } ?>
            </td>
        </tr>
        <?php
        $no++;
    endforeach;
    ?>
    </tbody>
    <tfoot>
    <tr>
        <th width="10">No</th>
        <th width="200">Acara</th>
        <th width="80">Lokasi</th>
        <th width="50">Aksi</th>
    </tr>
    </tfoot>
</table>
    <div class="box-footer">
        <?php if($this->session->userdata('id_level') == '01') { ?>
        <a href="<?php echo base_url();?>agenda/tambah" ><button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> &nbsp;Tambah</button></a>
        <?php } ?>
        <a href="<?php echo base_url();?>kalender" ><button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-calendar"></i> &nbsp;Lihat Kalender Agenda</button></a>
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