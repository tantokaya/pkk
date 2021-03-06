<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Topik</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form"  enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/topik/simpan" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="hidden" name="code" id="code" class="form-control" value="<?php echo $code; ?>">
                    <input type="text" name="title" id="title" placeholder="Judul.." style="width: 350px;" class="form-control" value="<?php echo $title; ?>" autofocus="true">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" style="width: 250px;" required="true">
                        <option value="">-PILIH-</option>
                        <option value="perkenalan">Selamat datang dan Perkenalan</option>
                        <option value="pengumuman">Pengumuman</option>
                        <option value="saran">Saran Untuk Forum</option>
                        <option value="pojok">Pojok Komunitas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Topik</label>
                    <textarea id="editor1" name="topik" rows="10" cols="80"></textarea>
                </div>

            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
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
