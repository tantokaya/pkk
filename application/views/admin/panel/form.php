<?php $panelid = $this->uri->segment(3); ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Panel</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>panel/simpan" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Copyright</label>
                        <input type="hidden" name="kode" id="kode" style="width: 190px;" class="form-control" value="<?php echo $kode; ?>">
                        <input type="text" name="copyright" id="copyright"  class="form-control" value="<?php echo $copyright; ?>" >
                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" name="facebook" id="facebook" class="form-control" value="<?php echo $facebook; ?>">
                    </div>
                    <div class="form-group">
                        <label>Twitter</label>
                        <input type="text" name="twitter" id="twitter" class="form-control" value="<?php echo $twitter; ?>">
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name='userfile' value="<?php echo $image;  ?>">
                        <p class="help-block">Upload Image Logo disini.</p>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea  name="alamat" class="form-control"><?php echo $alamat; ?></textarea>
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
