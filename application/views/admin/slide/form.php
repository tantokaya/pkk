<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Slide Gambar</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>slide/simpan" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Judul Slide <span class="required">*</span> </label>
                        <input type="hidden" name="kode" id="kode" style="width: 190px;" class="form-control" value="<?php echo $kode; ?>">
                        <input type="text" name="judul" id="judul" placeholder="Judul Album.." class="form-control" value="<?php echo $judul; ?>" required="true" autofocus="true">
                    </div>
                    <div class="form-group">
                        <label>Isi <span class="required">*</span></label>
                        <textarea name="isi" id="isi" rows="3" class="form-control" style="width: 450px;" required="true"><?php echo $isi; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar Slide <span class="required">*</span></label>
                        <input type="file" name='userfile' value="<?php echo $image; ?>" required="true">
                        <p class="help-block">Upload Gambar Slide disini.</p>
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

