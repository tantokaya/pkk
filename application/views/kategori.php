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
    <div class="cleaner_h10"></div>

    <div id="detail-category">
	<?php
                foreach($all_post_in_kategori as $db):
                $link = set_permalink($db['post_id'],$db['post_judul']);
                $hasil = $this->app_model->tgl_indo($db['post_tgl']);
                $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
                $hari = getday($hasil2,'/');
                $isi = character_limiter($db['post_isi'],330);
                ?>
                
            <table width="100%" cellpadding="5" cellspacing="0" border="0">
                <tr>
                    <td colspan="2"><h1><a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>"> <?php echo $db['post_judul']; ?> </a></h1></td>
                </tr>
                <tr>
                    <td id="detail-category-time" colspan="2"><?php echo $hari.', '.$hasil; ?> | <?php echo $db['post_time']; ?> - Oleh <strong><?php echo $db['username']; ?></strong></td>
                </tr>
                <tr>
                    <?php if($db['post_gambar']!='') {?>
                    <td>
                        <img src="<?php echo base_url(); ?>uploads/post/<?php echo $db['post_gambar'] ?>">
                    </td>
                    <?php } else { ?>
                    <td>
                        <img src="<?php echo base_url(); ?>asset/images/blank.jpg">
                    </td>
                    <?php } ?>
                    <td style="text-align: justify;"><?php echo $isi; ?></td>
                </tr>
            </table>
            <?php endforeach; ?>
        </div>
    <div id="footnote-comment-box">
        <?php echo $links; ?>
        <!--
        <div class="pagingpage-nomor">1</div>
        <div class="pagingpage-nomor">2</div>
        <div class="pagingpage-nomor">3</div>
        <div class="pagingpage-nomor">4</div>
        <div class="pagingpage-nomor">5</div>
        <div class="pagingpage">Selanjutnya ></div>
        <div class="pagingpage">Terakhir >></div>
        -->
    </div>

    <div class="cleaner_h5"></div>
    <?php if($this->widget_model->CariPublishBanerByKanan1_4() == 'Y') { ?>
        <img src="<?php echo base_url(); ?>uploads/baner/<?php echo $this->widget_model->CariImageBanerByKanan1_4(); ?>" style="width: 610px; height: 60px;" />
    <?php } ?>
    <div class="cleaner_h40"></div>

</div>
<div class="cleaner_h0"></div>
