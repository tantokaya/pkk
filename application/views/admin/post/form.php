<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Post Berita</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form name="form" id="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>post/simpan" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="hidden" name="kode" id="kode" style="width: 190px;" class="form-control" value="<?php echo $kode; ?>">
                        <input type="text" name="judul" id="judul"  class="form-control" value="<?php echo $judul; ?>" autofocus="true">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" id="kategori" class="form-control" style="width: 200px;" required>
                            <?php
                            if(empty($kategori)){
                                ?>
                                <option value="">-   PILIH    -</option>
                            <?php
                            }
                            foreach($l_kategori->result() as $t){
                                if($kategori==$t->kategori_id){
                                    ?>
                                    <option value="<?php echo $t->kategori_id;?>" selected="selected"><?php echo $t->kategori;?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo $t->kategori_id;?>"><?php echo $t->kategori;?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Isi</label>
                        <textarea id="editor1" name="isi" rows="10" cols="80"><?php echo $isi; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Feature Image </label>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <?php if($this->uri->segment(2)=='edit' AND $foto !=='') {?>
                                    <img data-src="holder.js/100%x100%" src="<?php echo base_url();?>uploads/post/thumbs/<?php echo $foto; ?>" >
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
                    
                    <!-- start slide upload -->
                    <div class="form-group">
                        <label>Slide Image 1</label>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <?php if($this->uri->segment(2)=='edit' AND $foto !=='') {?>
                                    <img data-src="holder.js/100%x100%" src="<?php echo base_url();?>uploads/post/thumbs/<?php echo $foto; ?>" >
                                <?php } else {?>
                                    <img data-src="holder.js/100%x100%" src="<?php echo base_url();?>asset/admin/jasny-bootstrap/index.svg" >
                                <?php } ?>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new"><i class="fa fa-fw fa-camera" ></i> Browse Foto </span>
                                    <span class="fileinput-exists">Ubah</span><input type="file" name="slide[]"></span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Slide Image 2 </label>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <?php if($this->uri->segment(2)=='edit' AND $foto !=='') {?>
                                    <img data-src="holder.js/100%x100%" src="<?php echo base_url();?>uploads/post/thumbs/<?php echo $foto; ?>" >
                                <?php } else {?>
                                    <img data-src="holder.js/100%x100%" src="<?php echo base_url();?>asset/admin/jasny-bootstrap/index.svg" >
                                <?php } ?>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new"><i class="fa fa-fw fa-camera" ></i> Browse Foto </span>
                                    <span class="fileinput-exists">Ubah</span><input type="file" name="slide[]"></span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Slide Image 3 </label>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <?php if($this->uri->segment(2)=='edit' AND $foto !=='') {?>
                                    <img data-src="holder.js/100%x100%" src="<?php echo base_url();?>uploads/post/thumbs/<?php echo $foto; ?>" >
                                <?php } else {?>
                                    <img data-src="holder.js/100%x100%" src="<?php echo base_url();?>asset/admin/jasny-bootstrap/index.svg" >
                                <?php } ?>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new"><i class="fa fa-fw fa-camera" ></i> Browse Foto </span>
                                    <span class="fileinput-exists">Ubah</span><input type="file" name="slide[]"></span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
                            </div>
                        </div>
                    </div>
                    <!-- end slide upload -->
                    
                    </div>
                    <div class="callout callout-info">
                        <h4>SEO Tools :</h4>
                        <label>Judul (Maksimal 60 Karakter)</label>
                        <input type="text" name="title" id="title"  class="form-control" value="<?php echo $title; ?>" maxlength="60">

                        <label>Deskripsi (Maksimal 160 Karakter)</label>
                        <textarea class="form-control" name="desc" id="desc" rows="3" maxlength="160"><?php echo $desc; ?></textarea>

                        <label>Keywords</label>
                        <input type="keywords" name="keywords" id="keywords"  class="form-control" value="<?php echo $keywords; ?>" >
                    </div>
                    <?php if($this->uri->segment(2)=='tambah') { ?>
                    <div class="form-group">
                        <label>Tag Berita</label>
                        <div id="tampil_tag" ></div>
                    </div>
                    <?php } else { ?>
                    <div class="form-group">
                        <label>Tag</label>
                        <?php
                            echo $tag;
                        ?>
                    </div>
                    <?php } ?>
                    <?php if($this->session->userdata('id_level')=='01') { ?>
                    <div class="form-group">
                        <label>Publish &nbsp;</label>
                        <?php if($this->uri->segment(2)=='tambah') {?>
                            <input type="radio" name="status" value="Y" class="flat-red" checked/>Y
                            <input type="radio" name="status" value="N" class="flat-red"/>N
                        <?php }else { ?>
                            <input type="radio" name="status" <?php if($status=='Y') echo 'checked'; ?> value="Y" class="flat-red"/>Y
                            <input type="radio" name="status" value="N" <?php if($status=='N') echo 'checked'; ?> class="flat-red"/>N
                        <?php } ?>
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
<!-- Upload Thumbnail -->
<script src="<?php echo base_url();?>asset/admin/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
<!-- CK Editor -->
<script src="<?php echo base_url();?>asset/admin/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
//        $(".textarea").wysihtml5();
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){

        tampil_tag();

        function tampil_tag(){
            $.ajax({
//                type	: 'POST',
                url		: "<?php echo site_url(); ?>post/DataTag",
                success	: function(data){
                    $("#tampil_tag").html(data);
                }
            });
            //return false();
        }
    });
</script>