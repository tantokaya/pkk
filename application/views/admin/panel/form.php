<?php $panelid = $this->uri->segment(3); ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Galeri Foto /Gambar</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>panel/simpan" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Panel</label>
                        <input type="hidden" name="kode" id="kode" style="width: 190px;" class="form-control" value="<?php echo $kode; ?>">
                        <input type="text" name="name" id="name" placeholder="..." class="form-control" value="<?php echo $name; ?>" readonly>
                    </div>
                    <?php if($panelid=='1') { ?>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name='userfile' value="<?php echo $image;  ?>">
                        <p class="help-block">Upload Image Logo disini.</p>
                    </div>
                    <?php } ?>
                    <?php if($panelid=='4'||$panelid=='3'||$panelid=='2') { ?>
                    <div class="form-group">
                        <label>Isi</label>
                        <textarea  name="isi" class="form-control"><?php echo $isi; ?></textarea>
                    </div>
                    <?php } ?>
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
