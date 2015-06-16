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

    <h3><?php echo $this->post_model->CariWidgetByJudul();?></h3>
    <div id="content-attribute">
        <span style="float:left; width:200px; text-align:left; font-style: italic;">Post date : <?php echo $this->post_model->CariWidgetByTgl();?>	 | <?php echo $this->post_model->CariWidgetByTime();?> </span>
        <span style="float:right; width:390px; text-align:right;">Dibaca: <strong>57</strong> kali | <strong>0</strong> komentar | Share
        <script language="javascript">
            document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'> Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'> Facebook</a> ");
        </script></span>
        <div class="cleaner_h0"></div>
    </div>
    <div class="cleaner_h10"></div>
    <div id="detail-img-with-article">
        <?php if($this->post_model->CariWidgetByImage() != '') { ?>
            <img src="<?php echo base_url(); ?>uploads/widget/<?php echo $this->post_model->CariWidgetByImage(); ?>" width="300" height="200" />
        <?php } else { ?>
            <img src="<?php echo base_url(); ?>asset/images/blank.jpg" width="300" height="200" />
        <?php } ?>
        <div class="cleaner_h10"></div>
        <strong>Berita Lainnya</strong>
        <ul>
            <?php
            foreach($all_post_by_widget as $db):
                $link = set_permalink($db['post_id'],$db['post_judul']);
                ?>
                <li><a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>"><?php echo $db['post_judul']; ?></a> </li>
            <?php endforeach; ?>
        </ul>

    </div>
    <font style="text-align: justify;"><?php echo $this->post_model->CariWidgetByIsi(); ?></font>

    <div class="cleaner_h20"></div>

    <div id="content-attribute">
        <span style="float:left; width:200px; text-align:left; font-style: italic;">Post date : <?php echo $this->post_model->CariWidgetByTgl();?>	 | <?php echo $this->post_model->CariWidgetByTime();?> </span>
<span style="float:right; width:390px; text-align:right;">Dibaca: <strong>57</strong> kali | <strong>0</strong> komentar | Share
<script language="javascript">
    document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'> Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'> Facebook</a> ");
</script></span>
        <div class="cleaner_h0"></div></div>


    <div class="cleaner_h5"></div>
    <?php if($this->widget_model->CariPublishBanerByKanan1_3() == 'Y') { ?>
        <img src="<?php echo base_url(); ?>uploads/baner/<?php echo $this->widget_model->CariImageBanerByKanan1_3(); ?>" style="width: 610px; height: 60px;" />
    <?php } ?>
    <div class="cleaner_h5"></div>

    <!--<div id="content-attribute">
        <strong>APA KOMENTAR ANDA...???</strong>
        <div class="cleaner_h0"></div>
    </div>
    <div class="cleaner_h10"></div>
    <div id="comment-box">
        <form method="post" action="">
            <table width="100%" cellpadding="5" cellspacing="0" border="0">
                <tr>
                    <td>Nama Lengkap</td><td>:</td><td><input type="text" class="input-textfield-comment" /></td>
                </tr>
                <tr>
                    <td>Email</td><td>:</td><td><input type="text" class="input-textfield-comment" /></td>
                </tr>
                <tr>
                    <td>Website</td><td>:</td><td><input type="text" class="input-textfield-comment" /></td>
                </tr>
                <tr>
                    <td>Komentar Anda</td><td>:</td><td><textarea class="input-comment" /></textarea></td>
                </tr>
                <tr>
                    <td></td><td></td><td><img src="<?php echo base_url(); ?>asset/images/captcha.jpg" /></td>
                </tr>
                <tr>
                    <td>Kode Captcha</td><td>:</td><td><input type="text" class="input-textfield-comment" /></td>
                </tr>
                <tr><td></td><td></td><td><input type="image" src="<?php echo base_url(); ?>asset/images/kirim.png" /> <input type="image" src="images/batal.png" /></td></tr>
            </table>
        </form>
        <div class="cleaner_h10"></div>
        <div id="footnote-comment-box">
            Redaksi menerima komentar terkait artikel yang ditayangkan. Isi komentar menjadi tanggung jawab pengirim. Pembaca berhak melaporkan komentar jika dianggap tidak etis, kasar, berisi fitnah, atau berbau SARA. Redaksi akan menilai laporan dan berhak memberi peringatan dan menutup akses terhadap pemberi komentar.
        </div>
    </div> -->
    <div class="cleaner_h5"></div>
    <?php if($this->widget_model->CariPublishBanerByKanan1_4() == 'Y') { ?>
        <img src="<?php echo base_url(); ?>uploads/baner/<?php echo $this->widget_model->CariImageBanerByKanan1_4(); ?>" style="width: 610px; height: 60px;" />
    <?php } ?>
    <div class="cleaner_h40"></div>

</div>
<div class="cleaner_h0"></div>

