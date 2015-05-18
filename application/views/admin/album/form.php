<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Album Gambar</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>album/simpan" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Judul Album</label>
                        <input type="hidden" name="kode" id="kode" style="width: 190px;" class="form-control" value="<?php echo $kode; ?>">
                        <input type="text" name="judul" id="judul" placeholder="Judul Album.." class="form-control" value="<?php echo $judul; ?>" autofocus="true">
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name='userfile' value="">
                        <p class="help-block">Upload Gambar Album disini.</p>
                    </div>
                    <div class="form-group">
                        <label>Aktif &nbsp;</label>
                        <?php if($this->uri->segment(3)=='tambah') {?>
                        <input type="radio" name="status" value="Y" class="flat-red"/>Y
                        <input type="radio" name="status" value="N" class="flat-red"/>N
                        <?php }else { ?>
                        <input type="radio" name="status" <?php if($status=='Y') echo 'checked'; ?> value="Y" class="flat-red"/>Y
                        <input type="radio" name="status" value="N" <?php if($status=='N') echo 'checked'; ?> class="flat-red"/>N
                        <?php } ?>
                    </div>

                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                    <button type="button"  class="btn btn-success" onclick=self.history.back()><i class="glyphicon glyphicon-arrow-left"></i> Kembali</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>

<!-- jQuery 2.0.2 -->
<script src="<?php echo base_url();?>asset/admin/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>asset/admin/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>asset/admin/js/AdminLTE/app.js" type="text/javascript"></script>

