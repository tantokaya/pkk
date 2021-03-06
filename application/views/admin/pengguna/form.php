<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Agenda</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form"  enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/pengguna/simpan" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label>Username</label>
                    <?php if($this->uri->segment(2)=='tambah') { ?>
                    <input type="text" name="username" id="username" placeholder="Username.." style="width: 190px;" class="form-control" value="" required="true">
                    <?php } elseif($this->uri->segment(2)=='edit') { ?>
                    <input type="text" name="username" id="username" placeholder="Username.." style="width: 190px;" class="form-control" value="<?php echo $username; ?>" required="true" readonly>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pwd" id="pwd" placeholder="Password..." style="width: 190px;" class="form-control" value="<?php echo $pwd; ?>">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <div class="input-medium"><select name="level" id="level" class="form-control" style="width: 190px;">
                            <?php
                            if(empty($level)){
                                ?>
                                <option value="">-PILIH-</option>
                            <?php
                            }
                            foreach($l_level->result() as $t){
                                if($level==$t->id_level){
                                    ?>
                                    <option value="<?php echo $t->id_level;?>" selected="selected"><?php echo $t->level;?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo $t->id_level;?>"><?php echo $t->level;?></option>
                                <?php }
                            } ?>
                        </select></div>
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama.." style="width: 300px;" class="form-control" value="<?php echo $nama_lengkap; ?>">
                </div>
                <div class="form-group">
                    <label>No Hp</label>
                    <input type="text" name="hp" id="hp" placeholder="Hp..." style="width: 300px;" class="form-control" value="<?php echo $hp; ?>">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" name="email" id="email" placeholder="Email..." style="width: 300px;" class="form-control" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name='userfile' value="<?php echo $foto; ?>">
                    <p class="help-block">Upload Foto pengguna disini.</p>
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
