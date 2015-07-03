<?php
$lvl = $this->session->userdata('id_level');

?>
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Pengguna</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form"  enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/pengguna/simpan" method="post">
            <div class="box-body">
                <div class="form-group">
                    <label>Username</label>
                    <?php if($this->uri->segment(2)=='edit') { ?>
                    <input type="text" name="username" id="username"  style="width: 190px;" class="form-control" value="<?php echo $username; ?>" readonly>
                    <?php } else { ?>
                    <input type="text" name="username" id="username" placeholder="Username.." style="width: 190px;" class="form-control" value="<?php echo set_value('username'); ?>" autofocus="true">
                    <?php } ?><?php echo form_error('username','<div class="form-group has-error"><label class="control-label" for="inputError">','</label></div>'); ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pwd" id="pwd" placeholder="Password..." style="width: 190px;" class="form-control" value="<?php echo $pwd; ?>">
<!--                    --><?php //echo form_error('pwd','<div class="form-group has-error"><label class="control-label" for="inputError">','</label></div>'); ?>
                </div>
                <?php if($lvl == '01'){ ?>
                    <div class="form-group">
                        <label for="textfield" class="control-label">Level</label>
                        <div class="controls">
                            <div class="input-medium"><select name="level" id="level" class="form-control" style="width: 190px">
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
                    </div>
                <?php } elseif ($lvl =='02') { ?>
                    <div class="form-group">
                        <label for="textfield" class="control-label">Level</label>
                        <div class="controls">
                            <div class="input-medium"><select name="level" id="level" class="form-control" style="width:190px;">
                                    <?php
                                    if(empty($level)){
                                        ?>
                                        <option value="">-PILIH-</option>
                                    <?php
                                    }
                                    foreach($l_level_admin->result() as $t){
                                        if($level==$t->id_level){
                                            ?>
                                            <option value="<?php echo $t->id_level;?>" selected="selected"><?php echo $t->level;?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $t->id_level;?>"><?php echo $t->level;?></option>
                                        <?php }
                                    } ?>
                                </select></div>
                        </div>
                    </div>
                <?php } elseif ($lvl =='03') { ?>
                    <div class="form-group">
                        <label for="textfield" class="control-label">Level</label>
                        <div class="controls">
                            <div class="input-medium"><select name="level" id="level" class="form-control" style="width: 190px;">
                                    <?php
                                    if(empty($level)){
                                        ?>
                                        <option value="">-PILIH-</option>
                                    <?php
                                    }
                                    foreach($l_level_user->result() as $t){
                                        if($level==$t->id_level){
                                            ?>
                                            <option value="<?php echo $t->id_level;?>" selected="selected"><?php echo $t->level;?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $t->id_level;?>"><?php echo $t->level;?></option>
                                        <?php }
                                    } ?>
                                </select></div>
                        </div>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label>Cabang Puskomkreatif</label>
                    <div class="input-medium"><select name="cabang" id="cabang" class="form-control" style="width: 190px;" required="true">
                            <?php
                            if(empty($cabang)){
                                ?>
                                <option value="">-PILIH-</option>
                            <?php
                            }
                            foreach($l_cabang->result() as $t){
                                if($cabang==$t->cabang_id){
                                    ?>
                                    <option value="<?php echo $t->cabang_id;?>" selected="selected"><?php echo $t->cabang_name;?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo $t->cabang_id;?>"><?php echo $t->cabang_name;?></option>
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
                    <label>Foto Pengguna </label>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                            <?php if($this->uri->segment(2)=='edit' AND $foto !=='') {?>
                                <img data-src="holder.js/100%x100%" src="<?php echo base_url();?>uploads/profile/thumbs/<?php echo $foto; ?>" >
                            <?php } else {?>
                                <img data-src="holder.js/100%x100%" src="<?php echo base_url();?>asset/admin/jasny-bootstrap/index.svg" >
                            <?php } ?>
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                        <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new"><i class="fa fa-fw fa-camera" ></i> Browse Foto </span>
                                    <span class="fileinput-exists">Ubah</span><input type="file" name="userfile"></span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                        </div>
                    </div>
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
<!-- Upload Thumbnail -->
<script src="<?php echo base_url();?>asset/admin/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>

