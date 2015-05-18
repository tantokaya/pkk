<script src="<?php echo base_url();?>asset/admin/js/fileuploader.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#name").focus();

        var code	= $("#code").val();
        var FileUploader_uploadFile = new qq.FileUploader(
            {
                'element':document.getElementById("lampiran"),
                'debug':false,
                'multiple':false,
                'action':'<?php echo base_url('index.php/agenda/upload'); ?>',
                'allowedExtensions':['pdf','doc','docx','pptx','ppt'],
                'sizeLimit':10485760,
                'minSizeLimit':100,
                'params' : {
                    'code'  : code
                },
                'onComplete':function(id, fileName, responseJSON){
                    $('#lampirancontainer').append(
                        "<input type=\"hidden\" name=\"lampiran[]\" value=\""+responseJSON.idlampiran+"\" />"
                    );
                }
            });



    });
</script>
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Agenda</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('agenda/simpan', array('id'=>'form','name'=>'form' )); ?>
            <div class="box-body">
                <div class="form-group">
                    <label>Kode Agenda</label>
                    <input type="text" name="code" id="code" placeholder="Kode.." class="form-control" style="width: 110px;" value="<?php echo $code; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Acara</label>
                    <input type="text" name="name" id="name" placeholder="Acara..." class="form-control" style="width: 350px;" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="desc" id="desc" rows="5" class="form-control" style="width: 450px;"><?php echo $desc; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Tgl Mulai</label>
                    <input type="text" name="mulai" id="mulai"  class="form-control" style="width: 110px;" value="<?php echo $mulai; ?>">
                </div>
                <div class="form-group">
                    <label>Tgl Akhir</label>
                    <input type="text" name="akhir" id="akhir" class="form-control" style="width: 110px;" value="<?php echo $akhir; ?>">
                </div>
                <div class="form-group">
                    <label>Lokasi</label>
                    <textarea name="lokasi" id="lokasi" rows="3" class="form-control" style="width: 450px;"><?php echo $lokasi; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Mitra</label>
                    <select name="mitra" id="mitra" class="form-control" style="width: 400px;" required>
                        <?php
                        if(empty($mitra)){
                            ?>
                            <option value="">-   PILIH    -</option>
                        <?php
                        }
                        foreach($l_mitra->result() as $t){
                            if($mitra==$t->mitra_code){
                                ?>
                                <option value="<?php echo $t->mitra_code;?>" selected="selected"><?php echo $t->mitra_name;?></option>
                            <?php }else{ ?>
                                <option value="<?php echo $t->mitra_code;?>"><?php echo $t->mitra_name;?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Upload File Lampiran</label>
                    <div class="fileupload fileupload-new" data-provides="fileupload" id="lampiran" >
                        <div class="input-append">
                            <input type="file" name="userfile[]" id="file_1"/><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                        </div>
                    </div>
                    <div id="lampirancontainer"></div>
                </div>
                <?php if($this->uri->segment(2) == "edit")
                {
                    ?>
                    <div class="control-group">
                        <div class="controls">
                            <table class="table table-hover table-nomargin table-bordered" id="list-lampiran">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama File</th>
                                    <th class='hidden-350'>Tipe</th>
                                    <th class='hidden-1024'>Ukuran</th>
                                    <th class='hidden-480'>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;
                                foreach($l_lampiran as $lmp){
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><a href="<?php echo base_url() . 'uploads/' .$lmp['lampiran_nama'];?>"><?php echo $lmp['lampiran_nama']; ?></a></td>
                                        <td><?php echo $lmp['lampiran_ext']; ?></td>
                                        <td><?php echo $lmp['lampiran_size']; ?></td>
                                        <td><a href="#" id="<?php echo $lmp['lampiran_id']; ?>" class="hapus btn" rel="tooltip" title="Hapus">
                                                <i class="fa fa-trash-o"></i> Hapus
                                            </a></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <script type="application/javascript">
                        $(function(){
                            $(".hapus").click(function(event){
                                event.preventDefault();
                                if(confirm("Apakah anda ingin menghapus data ini?")){
                                    var lampid = $(this).attr("id");
                                    var parent = $(this).parent().parent();
                                    //console.log(lampid + "\n" + parent);
                                    $.ajax({
                                        type    :   "post",
                                        url     :   "<?php echo base_url(); ?>index.php/agenda/delete_lampiran",
                                        cache   :   false,
                                        data    :   "lampiran_id=" + lampid,
                                        success :   function(response){
                                            try{
                                                if(response=='true'){
                                                    parent.slideUp('slow', function() {$(this).remove();});
                                                }
                                            } catch(e) {
                                                alert("error hapus data lampiran..");
                                            }
                                        },
                                        error : function(){
                                            alert("error hapus");
                                        }
                                    });
                                }
                            });
                        });
                    </script>
                <?php } ?>

            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
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
