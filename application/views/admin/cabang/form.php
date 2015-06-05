<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-border-purple">
                <h3 class="box-title">Form Cabang Puskomkreatif</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form"  action="<?php echo base_url(); ?>cabang/simpan" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Cabang<span class="required">*</span> </label>
                        <input type="hidden" name="kode" id="kode" style="width: 190px;" class="form-control" value="<?php echo $kode; ?>">
                        <input type="text" name="name" id="name" placeholder="Nama cabang.."  class="form-control" value="<?php echo $name; ?>" autofocus="true" required="true">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control"><?php echo $alamat; ?></textarea>
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
<!-- UNIFORM -->
<script type="text/javascript" src="<?php echo base_url();?>asset/admin/js/uniform/jquery.uniform.min.js"></script>
