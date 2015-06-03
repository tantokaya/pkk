<?php $pooling = $this->uri->segment(3); ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Pooling</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>panel/simpan" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Pertanyaan</label>
                        <input type="text" name="pertanyaan" id="pertanyaan"  class="form-control" value="<?php echo $pertanyaan; ?>" >
                    </div>
                    <div class="form-group">
                        <label>Jawaban 1</label>
                        <input type="text" name="jawaban1" id="jawaban1" class="form-control" value="<?php echo $jawaban1; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jawaban 2</label>
                        <input type="text" name="jawaban2" id="jawaban2" class="form-control" value="<?php echo $jawaban2; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jawaban 3</label>
                        <input type="text" name="jawaban3" id="jawaban3" class="form-control" value="<?php echo $jawaban3; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jawaban 4</label>
                        <input type="text" name="jawaban4" id="jawaban4" class="form-control" value="<?php echo $jawaban4; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jawaban 5</label>
                        <input type="text" name="jawaban5" id="jawaban5" class="form-control" value="<?php echo $jawaban5; ?>">
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
