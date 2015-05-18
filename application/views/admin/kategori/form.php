<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Kategori Berita</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form"  action="<?php echo base_url(); ?>kategori/simpan" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="hidden" name="kode" id="kode" class="form-control" value="<?php echo $kode; ?>">
                        <input type="text" name="name" id="name" placeholder="Nama Kategori.."  class="form-control" value="<?php echo $name; ?>" autofocus="true">
                    </div>
                    <div class="form-group">
                        <label>Widget</label>
                        <select name="widget" id="widget" class="form-control" >
                            <?php
                            if(empty($widget)){
                                ?>
                                <option value="">-   PILIH    -</option>
                            <?php
                            }
                            foreach($l_widget->result() as $t){
                                if($widget==$t->widget_id){
                                    ?>
                                    <option value="<?php echo $t->widget_id;?>" selected="selected"><?php echo $t->widget_judul.' ( '.$t->widget_name.' )';?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo $t->widget_id;?>"><?php echo $t->widget_judul.' ( '.$t->widget_name.' )';?></option>
                                <?php }
                            } ?>
                        </select>
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
