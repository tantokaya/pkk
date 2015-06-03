<div id="left-center-content">
<div class="cleaner_h10"></div>
<?php if($this->widget_model->CariPublishBanerByKiri1_1() == 'Y') { ?>
    <img src="<?php echo base_url(); ?>uploads/baner/<?php echo $this->widget_model->CariImageBanerByKiri1_1(); ?>" style="width: 335px; height: 155px;" />
<?php } ?>
<div class="cleaner_h10"></div>

<script>
    $(document).ready(function(){
        $("a.tab").click(function () {
            $(".active").removeClass("active");
            $(this).addClass("active");
            $(".content").slideUp();
            var content_show = $(this).attr("title");
            $("#"+content_show).slideDown();
        });
    });
</script>
<div class="tabbed_box">
    <div class="tabbed_area">
        <ul class="tabs">
            <li><a href="javascript:void(0);" title="content_1" class="tab active">Terkini</a></li>
            <li><a href="javascript:void(0);" title="content_2" class="tab">Terpopuler</a></li>
            <li><a href="javascript:void(0);" title="content_3" class="tab">Kategori</a></li>
        </ul>
        <div id="content_1" class="content">
            <ul>
                <?php
                foreach($all_new_post as $db):
                    $link = set_permalink($db['post_id'],$db['post_judul']);
                    $hasil = $this->app_model->tgl_indo($db['post_tgl']);
                    $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
                    $hari = getday($hasil2,'/');
                    ?>
                    <li>
                        <a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>">
                            <div id="detail-widget-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $db['post_time'];?></div>
                            <?php echo $db['post_judul'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div id="content_2" class="content">
            <ul>
                <?php
                foreach($all_new_post_baca as $db):
                    $link = set_permalink($db['post_id'],$db['post_judul']);
                    $hasil = $this->app_model->tgl_indo($db['post_tgl']);
                    $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
                    $hari = getday($hasil2,'/');
                    ?>
                    <li>
                        <a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>">
                            <div id="detail-widget-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $db['post_time'];?></div>
                            <?php echo $db['post_judul'].' ('.$db['dibaca'].')' ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div id="content_3" class="content">
            <ul>
                <?php
                foreach($all_post_by_kategori as $db):
                    $link = set_permalink($db['kategori_id'],$db['kategori']);
                    ?>
                    <li><a href="<?php echo base_url(); ?>kategori/detail/<?php echo $link; ?>"> <?php echo $db['kategori'].' ('.$db['jml'].') ' ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<div class="cleaner_h10"></div>

<div id="sub-left-center-content">
    <div id="single-sub-left-center-content">
        <div id="title-sub-small"><?php echo $this->widget_model->CariJudulWidgetByKiriText1_1();?></div>
        <?php
        $id = $this->widget_model->CariIdWidgetByKiriText1_1();
        $judul_isi = $this->widget_model->CariJudulIsiWidgetByKiriText1_1();
        $linkWidgetByKiriText1_1 = set_permalink($id,$judul_isi);
        $hasil = $this->app_model->tgl_indo($this->widget_model->CariWidgetByHariKiri1_1());
        $hasil2 = $this->app_model->tgl_str($this->widget_model->CariWidgetByHariKiri1_1());
        $hari = getday($hasil2,'/');
        ?>
        <a href="<?php echo base_url(); ?>widget/detail/<?php echo $linkWidgetByKiriText1_1; ?>">
            <div id="detail-content-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $this->widget_model->CariWidgetByTimeKiri1_1();?></div>
            <h2><?php echo $this->widget_model->CariJudulIsiWidgetByKiriText1_1();?></h2>
        </a>
        <img src="<?php echo base_url(); ?>uploads/widget/thumbs/<?php echo $this->widget_model->CariImageWidgetByKiriText1_1(); ?>" width="120" height="90" />
        <?php
        $isi = $this->widget_model->CariIsiWidgetByKiriText1_1();
        $isi = character_limiter($isi,150);
        echo $isi;
        ?>
    </div>
    <div class="cleaner_h5"></div>
    <?php
    foreach($all_post_by_w_1_1 as $db):
        $link = set_permalink($db['post_id'],$db['post_judul']);
        $hasil = $this->app_model->tgl_indo($db['post_tgl']);
        $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
        $hari = getday($hasil2,'/');
        ?>
        <div id="title-sub-left-center-content">
            <a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>">
                <div id="post-widget-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $db['post_time'];?></div>
                <?php echo '- '. $db['post_judul']; ?>
            </a>
        </div>
    <?php endforeach; ?>
    <div class="index-button">Indexs Berita</div>
</div>
<div class="cleaner_h5"></div>
<?php if($this->widget_model->CariPublishBanerByKiri1_2() == 'Y') { ?>
    <img src="<?php echo base_url(); ?>uploads/baner/<?php echo $this->widget_model->CariImageBanerByKiri1_2(); ?>" style="width: 335px; height: 155px;" />
<?php } ?>
<div class="cleaner_h5"></div>
<div id="sub-left-center-content">
    <div id="single-sub-left-center-content">
        <div id="title-sub-small"><?php echo $this->widget_model->CariJudulWidgetByKiriText1_2();?></div>
        <?php
        $id = $this->widget_model->CariIdWidgetByKiriText1_2();
        $judul_isi = $this->widget_model->CariJudulIsiWidgetByKiriText1_2();
        $linkWidgetByKiriText1_2 = set_permalink($id,$judul_isi);
        $hasil = $this->app_model->tgl_indo($this->widget_model->CariWidgetByHariKiri1_1());
        $hasil2 = $this->app_model->tgl_str($this->widget_model->CariWidgetByHariKiri1_1());
        $hari = getday($hasil2,'/');
        ?>
        <a href="<?php echo base_url(); ?>widget/detail/<?php echo $linkWidgetByKiriText1_2; ?>">
            <div id="detail-content-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $this->widget_model->CariWidgetByTimeKiri1_2();?></div>
            <h2><?php echo $this->widget_model->CariJudulIsiWidgetByKiriText1_2();?></h2>
        </a>
        <img src="<?php echo base_url(); ?>uploads/widget/thumbs/<?php echo $this->widget_model->CariImageWidgetByKiriText1_2(); ?>" width="120" height="90" />
        <?php
        $isi = $this->widget_model->CariIsiWidgetByKiriText1_2();
        $isi = character_limiter($isi,150);
        echo $isi;
        ?>
    </div>
    <div class="cleaner_h5"></div>
    <?php
    foreach($all_post_by_w_1_2 as $db):
        $link = set_permalink($db['post_id'],$db['post_judul']);
        $hasil = $this->app_model->tgl_indo($db['post_tgl']);
        $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
        $hari = getday($hasil2,'/');
        ?>
        <div id="title-sub-left-center-content">
            <a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>">
                <div id="post-widget-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $db['post_time'];?></div>
                <?php echo '- '. $db['post_judul']; ?>
            </a>
        </div>
    <?php endforeach; ?>
    <div class="index-button">Indexs Berita</div>
</div>
<div class="cleaner_h10"></div>

<?php if($this->widget_model->CariPublishPooling() == 'Y') { ?>
<div id="sub-left-center-content">
    <div id="single-sub-left-center-content">
        <div id="title-sub-small">Jajak Pendapat</div>
        <?=$this->session->flashdata('pesan')?>
        <div class="cleaner_h10"></div>
        <strong><?= $polling->pertanyaan; ?></strong>
        <div class="cleaner_h5"></div>
        <form method="post" action="<?php echo base_url('home/save_polling'); ?>">
            <input type="radio" name="vote" value="1" /><?= $polling->jawaban1; ?><div class="cleaner_h5"></div>
            <input type="radio" name="vote" value="2" /><?= $polling->jawaban2; ?><div class="cleaner_h5"></div>
            <input type="radio" name="vote" value="3" /><?= $polling->jawaban3; ?><div class="cleaner_h5"></div>
            <input type="radio" name="vote" value="4" /><?= $polling->jawaban4; ?><div class="cleaner_h5"></div>
            <input type="radio" name="vote" value="5" /><?= $polling->jawaban5; ?><div class="cleaner_h5"></div>
            <input type="image" src="<?php echo base_url();?>asset/images/kirim.png" /> <input type="image" src="<?php echo base_url();?>asset/images/lihat.png" />
        </form>
        <div class="cleaner_h10"></div><div>Jumlah voting : <?= $total_vote; ?></div><div class="cleaner_h10"></div>
    </div>
</div>
<?php } ?>

<div class="cleaner_h5"></div>
<?php if($this->widget_model->CariPublishBanerByKiri1_3() == 'Y') { ?>
    <img src="<?php echo base_url(); ?>uploads/baner/<?php echo $this->widget_model->CariImageBanerByKiri1_3(); ?>" style="width: 335px; height: 155px;" />
<?php } ?>
<div class="cleaner_h5"></div>

<div id="sub-left-center-content">
    <div id="single-sub-left-center-content">
        <div id="title-sub-small">Bergabung Dengan Facebook Kami</div>
        <div class="cleaner_h10"></div>
        <!--            <img src="--><?php //echo base_url();?><!--asset/images/fb.png" />-->
        <div class="fb-page" data-href="https://www.facebook.com/pages/Classic-ROCK/674509606010257?skip_nax_wizard=true&amp;ref_type" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pages/Classic-ROCK/674509606010257?skip_nax_wizard=true&amp;ref_type"><a href="https://www.facebook.com/pages/Classic-ROCK/674509606010257?skip_nax_wizard=true&amp;ref_type">Classic ROCK</a></blockquote></div></div>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.3";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    </div>
</div>
<div class="cleaner_h10"></div>

<div id="sub-left-center-content">
    <div id="single-sub-left-center-content">
        <div id="title-sub-small">Statistik Pengunjung</div>
        <div class="cleaner_h10"></div>
        Total Pengunjung : <?php echo $jumlah_pengunjung; ?><br/>
        Total Hits : <?php echo $this->statistik_model->total_hits(); ?>
    </div>
</div>

</div>
