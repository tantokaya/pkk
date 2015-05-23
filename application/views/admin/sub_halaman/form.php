<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Sub Halaman</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form"  action="<?php echo base_url(); ?>sub_halaman/simpan" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Sub Menu <span class="required">*</span></label>
                        <input type="hidden" name="kode" id="kode" style="width: 190px;" class="form-control" value="<?php echo $kode; ?>">
                        <input type="text" name="name" id="name" placeholder="Nama halaman.." class="form-control" value="<?php echo $name; ?>" required="true" autofocus="true">
                    </div>
                    <div class="form-group">
                        <label>Menu Utama <span class="required">*</span></label>
                        <select name="halaman" id="halaman" class="form-control" style="width: 200px;" required="true">
                            <?php
                            if(empty($halaman)){
                                ?>
                                <option value="">-   PILIH    -</option>
                            <?php
                            }
                            foreach($l_halaman->result() as $t){
                                if($halaman==$t->hal_id){
                                    ?>
                                    <option value="<?php echo $t->hal_id;?>" selected="selected"><?php echo $t->hal_name;?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo $t->hal_id;?>"><?php echo $t->hal_name;?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Isi</label>
                        <textarea id='editor1' style='width: 800px; height: 350px;' name="isi"  ><?php echo $isi; ?></textarea>
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
//        CKEDITOR.replace('editor1');
        CKEDITOR.replace( 'editor1', {
            extraPlugins: 'image2'
        } );

        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();

    });
</script>