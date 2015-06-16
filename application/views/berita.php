<div id="right-center-content">
    <div class="cleaner_h10"></div>

    <ul id="crumbs">
        <li><a href="#">Home</a></li>
        <li>Headline News</li>
    </ul>

    <div class="cleaner_h5"></div>
    <?php if($this->widget_model->CariPublishBanerByKanan1_1() == 'Y') { ?>
    <img src="<?php echo base_url(); ?>uploads/baner/<?php echo $this->widget_model->CariImageBanerByKanan1_1(); ?>" style="width: 610px; height: 60px;" />
    <?php } ?>
    <div class="cleaner_h5"></div>

    <h3><?php echo $this->app_model->CariPostByJudul();?></h3>
    <div id="content-attribute">
	<?php $hari = getday($this->app_model->CariPostByHari(),'/') ?>
        <span style="float:left; width:280px; text-align:left; font-style: italic;">Post date : <?php echo $hari.', '.$this->app_model->CariPostByTgl();?> | <?php echo $this->app_model->CariPostByTime();?></span>
        <span style="float:right; width:310px; text-align:right;">Dibaca: <strong><?php echo $this->app_model->CariPostBydibaca(); ?></strong> kali | <strong>0</strong> komentar | Share
        <script language="javascript">
            document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'> Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'> Facebook</a> ");
        </script></span>
        <div class="cleaner_h0"></div>
    </div>
    <div class="cleaner_h10"></div>
    <div id="detail-img-with-article">
        <?php if($this->app_model->CariPostByImage() != '') { ?>
        <img src="<?php echo base_url(); ?>uploads/post/thumbs/<?php echo $this->app_model->CariPostByImage(); ?>" width="300" height="200" />
        <?php } else { ?>
        <img src="<?php echo base_url(); ?>asset/images/blank.jpg" width="300" height="200" />
        <?php } ?>
        <div class="cleaner_h10"></div>
        <strong>Berita Lainnya</strong>
        <ul>
            <?php
            foreach($all_post_by_detail as $db):
                $link = set_permalink($db['post_id'],$db['post_judul']);
                ?>
                <li><a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>"><?php echo $db['post_judul']; ?></a> </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <font style="text-align: justify;"><?php echo $this->app_model->CariPostByIsi(); ?></font>

    <div class="cleaner_h20"></div>
    <?php
    foreach ($all_slide_post as $db):
        if($db['slide_post1']!=''){
            ?>
   <section>
        <div id="slide_flip_container" class="shadow">
            <div id="slide_flip_images" style="transform: translateX(0px); ">
                <img src="<?php echo base_url(); ?>uploads/post/thumbs/<?php echo $db['slide_post1']; ?>">
                <img src="<?php echo base_url(); ?>uploads/post/thumbs/<?php echo $db['slide_post2']; ?>">
                <img src="<?php echo base_url(); ?>uploads/post/thumbs/<?php echo $db['slide_post3']; ?>">
            </div>
        </div>

        <p id="slide_flip_controls">
            <span class="selected"><img src="<?php echo base_url(); ?>uploads/post/thumbs/<?php echo $db['slide_post1']; ?>" width="130px" height="70px"></span>
            <span><img src="<?php echo base_url(); ?>uploads/post/thumbs/<?php echo $db['slide_post2']; ?>" width="130px" height="70px"></span>
            <span><img src="<?php echo base_url(); ?>uploads/post/thumbs/<?php echo $db['slide_post3']; ?>" width="130px" height="70px"></span>
        </p>
    </section>
    <?php } endforeach; ?>
    <div class="cleaner_h5"></div>

    <div id="content-attribute">
	<?php $hari = getday($this->app_model->CariPostByHari(),'/') ?>
        <span style="float:left; width:280px; text-align:left; font-style: italic;">Post date : <?php echo $hari.', '.$this->app_model->CariPostByTgl();?> | <?php echo $this->app_model->CariPostByTime();?></span>        
<span style="float:right; width:310px; text-align:right;">Dibaca: <strong><?php echo $this->app_model->CariPostBydibaca(); ?></strong> kali | <strong><?php echo $this->app_model->JumlahKomentarByPostId(); ?></strong> komentar | Share
        <script language="javascript">
    document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'> Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'> Facebook</a> ");
</script></span>
        <div class="cleaner_h0"></div></div>


    <div class="cleaner_h5"></div>
    <?php if($this->widget_model->CariPublishBanerByKanan1_3() == 'Y') { ?>
        <img src="<?php echo base_url(); ?>uploads/baner/<?php echo $this->widget_model->CariImageBanerByKanan1_3(); ?>" style="width: 610px; height: 60px;" />
    <?php } ?>
    <div class="cleaner_h5"></div>

    <div id="content-attribute">
        <strong>APA KOMENTAR ANDA...???</strong>
        <div class="cleaner_h0"></div>
    </div>
    <div class="cleaner_h10"></div>
    <div id="comment-box">
        <p><?php echo validation_errors(); ?></p>
        <p style="color: #014686;"><?php if($this->session->flashdata('info')) echo $this->session->flashdata('info'); ?></p>
        <form accept-charset="utf-8" method="post" action="<?php echo base_url();?>news/post_comment/<?=$this->uri->segment(3);?>/<?=$this->uri->segment(4);?>">
            <input type="hidden" name="post_id" value="<?=$this->uri->segment(3);?>">
            <table width="100%" cellpadding="5" cellspacing="0" border="0">
                <tr>
                    <td>Nama Lengkap</td><td>:</td><td><input type="text" name="nama" autocomplete="off" class="input-textfield-comment" value="<?php echo set_value('nama'); ?>" /> </td>
                </tr>
                <tr>
                    <td>Email</td><td>:</td><td><input type="text" name="email" autocomplete="off" class="input-textfield-comment" value="<?php echo set_value('email'); ?>" /></td>
                </tr>
                <tr>
                    <td>Website</td><td>:</td><td><input type="text" name="website" autocomplete="off" class="input-textfield-comment" value="<?php echo set_value('website'); ?>" /></td>
                </tr>
                <tr>
                    <td>Komentar Anda</td><td>:</td><td><textarea class="input-comment" name="komentar"  /><?php echo set_value('komentar'); ?></textarea></td>
                </tr>
                <tr>
                    <td></td><td></td><td><?php echo $cap_img;?><!--<img src="<?php echo base_url(); ?>asset/images/captcha.jpg" />--></td>
                </tr>
                <tr>
                    <td>Kode Captcha</td><td>:</td><td><input type="text" name="kode_captcha" autocomplete="off" class="input-textfield-comment" /></td>
                </tr>
                <tr><td></td><td></td><td><input type="image" src="<?php echo base_url(); ?>asset/images/kirim.png" /> <!--<input type="image" src="images/batal.png" />--></td></tr>
            </table>
        </form>
        <div class="cleaner_h10"></div>
        
        <div id="content-attribute komentar">
        <strong>KOMENTAR</strong>
        <div class="cleaner_h0"></div>
    </div>
    <div class="cleaner_h10"></div>
    <!--
    <?php if($all_komen_by_post_id): ?>
    <div id="komentar-box">
           <ul>
               <?php foreach($all_komen_by_post_id as $komen): ?>
               <li>
                   <div class="meta"><span class="author"><?= $komen['komen_name']; ?></span> <span class="date"><?= $this->functions->format_tgl_cetak($komen['komen_tgl']); ?></span> </div>
                   <p><?= $komen['komen_isi']; ?></p>
               </li>
                <?php endforeach; ?>
           </ul>
    </div>
    <?php endif; ?>
    -->
    
    <?php if($all_komen_by_post_id): ?>
    	<hr width="100%">
        <table width="100%" cellpadding="5" cellspacing="0" border="0">
            <tr>
                <td colspan="3"><h1><?php echo $this->app_model->JumlahKomentarByPostId(); ?> Komentar</h1></td>
            </tr>
            <!--  Komentar Masuk  -->
            <?php foreach($all_komen_by_post_id as $komen): ?>
            <tr>
                <td style="width: 50px;"><img src="<?php echo base_url(); ?>asset/images/blank.png" style="width: 60px; height: 60px;"></td>
                <td style="text-align: left;" colspan="2">
                    <b><?= $komen['komen_name']; ?></b> <i><?= $this->functions->format_tgl_cetak($komen['komen_tgl']); ?> <?= $this->app_model->CariPostByTime(); ?></i><br/>
                    <?= $komen['komen_isi']; ?><br/>
                    <button type="button" id="<?= $komen['komen_id']; ?>" name="balas">Balas</button>
                </td>
            </tr>
            <?php endforeach; ?>
            </table>
    <?php endif; ?>
            <!--  Balasan Comment  -->
            <!--
                <tr>
                    <td></td>
                    <td style="width: 50px;"><img src="<?php echo base_url(); ?>asset/images/lulung.jpg" style="width: 60px; height: 60px;"></td>
                    <td style="text-align: left;">
                        <b>Lulung si jampang</b> <i>06 Mei 2015 02:02:19</i><br/>
                        hehehe... saya juga awalnya berpikir ribet<br/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="width: 50px;"><img src="<?php echo base_url(); ?>asset/images/ahok.jpg" style="width: 60px; height: 60px;"></td>
                    <td style="text-align: left;">
                        <b>Ahok cuy</b> <i>06 Mei 2015 02:52:19</i><br/>
                        Eh lung, ngapain loe koment disini ? Ama cewe aje cengar cengir loe<br/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="width: 50px;"><img src="<?php echo base_url(); ?>asset/images/lulung.jpg" style="width: 60px; height: 60px;"></td>
                    <td style="text-align: left;">
                        <b>Lulung si jampang</b> <i>06 Mei 2015 03:02:06</i><br/>
                        Ape hak loe hok nglarang-nglarang gw disini ? Ntar gw colok USB baru nyaho loe !<br/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="width: 50px;"><img src="<?php echo base_url(); ?>asset/images/jupe.jpg" style="width: 60px; height: 60px;"></td>
                    <td style="text-align: left;">
                        <b>JUPE Neeh..</b> <i>06 Mei 2015 03:14:19</i><br/>
                        Hadeuuhh.. ni bocah masih pada ribut aje disini sih ? Gw ketekin kapok loe !<br/>
                    </td>
                </tr>
            <!--  Komentar Masuk  -->
            <!--
            <tr>
                <td style="width: 50px;"><img src="<?php echo base_url(); ?>asset/images/bg.jpg" style="width: 60px; height: 60px;"></td>
                <td style="text-align: left;" colspan="2">
                    <b>Budi Gunawan Alias BG</b> <i>06 Mei 2015 03:13:12</i><br/>
                    Mantap Gan... ijin sedot !<br/>
                    <button type="button" name="balas">Balas</button>
                </td>
            </tr>
            <!--  Balasan Comment  -->
            <!--
                <tr>
                    <td></td>
                    <td style="width: 50px;"><img src="<?php echo base_url(); ?>asset/images/bw.jpg" style="width: 60px; height: 60px;"></td>
                    <td style="text-align: left;">
                        <b>Bambang</b> <i>06 Mei 2015 02:22:19</i><br/>
                        Sedot sedot... sini pale loe gw sedot :P <br/>
                    </td>
                </tr>

        </table>
        <div class="pagingpage-nomor">1</div>
        <div class="pagingpage-nomor">2</div>
        <div class="pagingpage-nomor">3</div>
        <div class="pagingpage-nomor">4</div>
        <div class="pagingpage-nomor">5</div>
        <div class="pagingpage">Selanjutnya ></div>
        <div class="pagingpage">Terakhir >></div>
        <div class="cleaner_h10"></div>
        -->
        <div id="footnote-comment-box">
            Redaksi menerima komentar terkait artikel yang ditayangkan. Isi komentar menjadi tanggung jawab pengirim. Pembaca berhak melaporkan komentar jika dianggap tidak etis, kasar, berisi fitnah, atau berbau SARA. Redaksi akan menilai laporan dan berhak memberi peringatan dan menutup akses terhadap pemberi komentar.
        </div>
    </div>
    <div class="cleaner_h5"></div>
    <?php if($this->widget_model->CariPublishBanerByKanan1_4() == 'Y') { ?>
        <img src="<?php echo base_url(); ?>uploads/baner/<?php echo $this->widget_model->CariImageBanerByKanan1_4(); ?>" style="width: 610px; height: 60px;" />
    <?php } ?>
    <div class="cleaner_h40"></div>

</div>
<div class="cleaner_h0"></div>
<input type="hidden" id="id" value="<?php echo $this->uri->segment(3); ?>">
<script type="text/javascript">
    $(document).ready(function(){
        input_baca();

         function input_baca(){
             var post_id = $("#id").val()
            $.ajax({
                type	: 'POST',
                url		: "<?php echo site_url(); ?>post/baca",
                data	: "post_id="+post_id,
                cache	: false,
                success	: function(data){

                }
            });
        }
    });
</script>