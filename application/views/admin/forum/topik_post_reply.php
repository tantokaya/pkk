<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Post Reply</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form" action="<?php echo base_url(); ?>topik/simpan_reply" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="hidden" name="code" id="code" class="form-control" value="<?php echo $code; ?>">
                        <input type="text" name="title" id="title" class="form-control" style="width: 180px;" value="<?php echo $title; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Reply Post</label>
                        <textarea id="editor2" name="post" rows="10" cols="80"><?php echo $post; ?></textarea>
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
        CKEDITOR.replace('editor2');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
</script>
