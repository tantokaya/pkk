<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Widget</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>widget/simpan" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Kode Widget</label>
                        <input type="hidden" name="kode" id="kode" style="width: 190px;" class="form-control" value="<?php echo $kode; ?>">
                        <input type="text" name="name" id="name" style="width: 190px;" class="form-control" value="<?php echo $name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Judul Widget</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="<?php echo $judul; ?>" autofocus="true">
                    </div>
                    <div class="form-group">
                        <label>Judul Isi Widget</label>
                        <input type="text" name="judul_isi" id="judul_isi" class="form-control" value="<?php echo $judul_isi; ?>" autofocus="true">
                    </div>
                    <div class="form-group">
                        <label>Isi Widget</label>
                        <textarea id="editor1" name="isi" rows="10" cols="80"><?php echo $isi; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Image Widget</label>
                        <input type="file" name='userfile' value="<?php echo $image; ?>">
                        <p class="help-block">Upload Image Widget disini.</p>
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
<!-- CK Editor -->
<script src="<?php echo base_url();?>asset/admin/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
</script>
