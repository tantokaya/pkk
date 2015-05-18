<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Komentar</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form"  action="<?php echo base_url(); ?>komentar/simpan" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Komentator</label>
                        <input type="hidden" name="kode" id="kode" style="width: 190px;" class="form-control" value="<?php echo $kode; ?>">
                        <input type="text" name="name" id="name" placeholder=".." style="width: 190px;" class="form-control" value="<?php echo $name; ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Web</label>
                        <input type="text" name="web" id="web"  style="width: 350px;" class="form-control" value="<?php echo $web; ?>" >
                    </div>
                    <div class="form-group">
                        <label>Isi</label>
                        <textarea id="editor1" name="isi" rows="10" cols="80"><?php echo $isi; ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Publish</label>
                        <?php
                        if($publish)
                        {
                        $pubArray = array('N','Y');
                            for($i = 0; $i< count($pubArray); $i++){
                                if($publish == $pubArray[$i])
                                    echo '<input type="radio" name="publish" value="'.$pubArray[$i].'" checked>  '.$pubArray[$i];
                                else
                                    echo '<input type="radio" name="publish" value="'.$pubArray[$i].'">  '.$pubArray[$i];

                                echo '&nbsp;&nbsp&nbsp';
                            }
                        }
                        ?>

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