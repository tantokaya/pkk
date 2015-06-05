<?php $this->statistik_model->pengunjung(); ?>


<div id="right-center-content">
    <div class="cleaner_h10"></div>

    <ul id="crumbs">
        <li><a href="#">Home</a></li>
        <li>Headline News</li>
    </ul>

    <div class="cleaner_h5"></div>
    <?php if($this->widget_model->CariPublishBanerByKanan1_1() == 'Y') { ?>
    <img src="<?php echo base_url(); ?>uploads/baner/thumbs/<?php echo $this->widget_model->CariImageBanerByKanan1_1(); ?>" style="width: 610px; height: 60px;" />
    <?php } ?>
    <div class="cleaner_h5"></div>

    <div id="slider">
        <ul id="sliderContent">
            <?php foreach($all_slide as $db): ?>
                <li class="sliderImage">
                    <img src="<?php echo base_url(); ?>uploads/slide/thumbs/<?php echo $db['slide_image'];?>" width="610" height="270"/>
                    <span class="bottom"><strong><?php echo $db['slide_judul']; ?></strong><br/>
                    <?php echo $db['slide_isi']; ?></span>
                </li>
            <?php endforeach; ?>
            <div class="clear sliderImage"></div>
        </ul>
    </div>
    <div class="cleaner_h10"></div>

    <div id="sub-right-center-content">
        <div id="single-sub-right-center-content">
            <div id="title-sub"><?php echo $this->widget_model->CariJudulWidgetByKananText1_1();?></div>
            <?php
                $id = $this->widget_model->CariIdWidgetByKananText1_1();
                $judul_isi = $this->widget_model->CariJudulIsiWidgetByKananText1_1();
                $linkWidgetByKananText1_1 = set_permalink($id,$judul_isi);
                $hasil = $this->app_model->tgl_indo($this->widget_model->CariWidgetByHariKanan1_1());
                $hasil2 = $this->app_model->tgl_str($this->widget_model->CariWidgetByHariKanan1_1());
                $hari = getday($hasil2,'/');
            ?>

           <a href="<?php echo base_url(); ?>widget/detail/<?php echo $linkWidgetByKananText1_1; ?>">
               <div id="detail-content-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $this->widget_model->CariWidgetByTimeKanan1_1();?></div>
                <h2><?php echo $this->widget_model->CariJudulIsiWidgetByKananText1_1();?></h2>
            </a>
            <img src="<?php echo base_url(); ?>uploads/widget/thumbs/<?php echo $this->widget_model->CariImageWidgetByKananText1_1(); ?>" width="280" height="120" />
            <?php
            $isi = $this->widget_model->CariIsiWidgetByKananText1_1();
            $isi = character_limiter($isi,150);
            echo $isi;
            ?>
        </div>
        <div class="cleaner_h10"></div>
        <?php
        foreach($all_post_by_wkanan_1_1 as $db):
            $link = set_permalink($db['post_id'],$db['post_judul']);
            $hasil = $this->app_model->tgl_indo($db['post_tgl']);
            $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
            $hari = getday($hasil2,'/');
            ?>
            <div id="title-sub-right-center-content">
                <a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>">
                    <div id="post-widget-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $db['post_time'];?></div>
                    <?php echo '- '. $db['post_judul']; ?>
                </a>
            </div>
        <?php endforeach; ?>
        <div class="index-button">Indexs Berita</div>
    </div>

    <div id="sub-right-center-content">
        <div id="single-sub-right-center-content">
            <div id="title-sub"><?php echo $this->widget_model->CariJudulWidgetByKananText1_2();?></div>
            <?php
                $id = $this->widget_model->CariIdWidgetByKananText1_2();
                $judul_isi = $this->widget_model->CariJudulIsiWidgetByKananText1_2();
                $linkWidgetByKananText1_2 = set_permalink($id,$judul_isi);
                $hasil = $this->app_model->tgl_indo($this->widget_model->CariWidgetByHariKanan1_2());
                $hasil2 = $this->app_model->tgl_str($this->widget_model->CariWidgetByHariKanan1_2());
                $hari = getday($hasil2,'/');
            ?>
            <a href="<?php echo base_url(); ?>widget/detail/<?php echo $linkWidgetByKananText1_2; ?>">
                <div id="detail-content-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $this->widget_model->CariWidgetByTimeKanan1_2();?></div>
                <h2><?php echo $this->widget_model->CariJudulIsiWidgetByKananText1_2();?></h2>
            </a>
            <img src="<?php echo base_url(); ?>uploads/widget/thumbs/<?php echo $this->widget_model->CariImageWidgetByKananText1_2(); ?>" width="280" height="120" />
            <?php
            $isi = $this->widget_model->CariIsiWidgetByKananText1_2();
            $isi = character_limiter($isi,150);
            echo $isi;
            ?>
        </div>
        <div class="cleaner_h10"></div>
        <?php
        foreach($all_post_by_wkanan_1_2 as $db):
            $link = set_permalink($db['post_id'],$db['post_judul']);
            $hasil = $this->app_model->tgl_indo($db['post_tgl']);
            $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
            $hari = getday($hasil2,'/');
            ?>
            <div id="title-sub-right-center-content">
                <a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>">
                    <div id="post-widget-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $db['post_time'];?></div>
                    <?php echo '- '. $db['post_judul']; ?>
                </a>
            </div>
        <?php endforeach; ?>
        <div class="index-button">Indexs Berita</div>
    </div>


    <div class="cleaner_h5"></div>
    <?php if($this->widget_model->CariPublishBanerByKanan1_2() == 'Y') { ?>
    <img src="<?php echo base_url(); ?>uploads/baner/thumbs/<?php echo $this->widget_model->CariImageBanerByKanan1_2(); ?>" style="width: 610px; height: 60px;" />
    <?php }  ?>
    <div class="cleaner_h5"></div>

    <div id="sub-right-center-content">
        <div id="single-sub-right-center-content">
            <div id="title-sub"><?php echo $this->widget_model->CariJudulWidgetByKananText2_1();?></div>
            <?php
                $id = $this->widget_model->CariIdWidgetByKananText2_1();
                $judul_isi = $this->widget_model->CariJudulIsiWidgetByKananText2_1();
                $linkWidgetByKananText2_1 = set_permalink($id,$judul_isi);
                $hasil = $this->app_model->tgl_indo($this->widget_model->CariWidgetByHariKanan2_1());
                $hasil2 = $this->app_model->tgl_str($this->widget_model->CariWidgetByHariKanan2_1());
                $hari = getday($hasil2,'/');
            ?>

            <a href="<?php echo base_url(); ?>widget/detail/<?php echo $linkWidgetByKananText2_1; ?>">
                <div id="detail-content-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $this->widget_model->CariWidgetByTimeKanan2_1();?></div>
                <h2><?php echo $this->widget_model->CariJudulIsiWidgetByKananText2_1();?></h2>
            </a>
            <img src="<?php echo base_url(); ?>uploads/widget/thumbs/<?php echo $this->widget_model->CariImageWidgetByKananText2_1(); ?>" width="280" height="120" />
            <?php
            $isi = $this->widget_model->CariIsiWidgetByKananText2_1();
            $isi = character_limiter($isi,150);
            echo $isi;
            ?>
        </div>
        <div class="cleaner_h10"></div>

        <?php
        foreach($all_post_by_wkanan_2_1 as $db):
            $link = set_permalink($db['post_id'],$db['post_judul']);
            $hasil = $this->app_model->tgl_indo($db['post_tgl']);
            $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
            $hari = getday($hasil2,'/');
            ?>
            <div id="title-sub-right-center-content">

                <a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>">
                    <div id="post-widget-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $db['post_time'];?></div>
                    <?php echo '- '. $db['post_judul']; ?>
                </a>
            </div>
        <?php endforeach; ?>
        <div class="index-button">Indexs Berita</div>
    </div>

    <div id="sub-right-center-content">
        <div id="single-sub-right-center-content">
            <div id="title-sub"><?php echo $this->widget_model->CariJudulWidgetByKananText2_2();?></div>
            <?php
                $id = $this->widget_model->CariIdWidgetByKananText2_2();
                $judul_isi = $this->widget_model->CariJudulIsiWidgetByKananText2_2();
                $linkWidgetByKananText2_2 = set_permalink($id,$judul_isi);
                $hasil = $this->app_model->tgl_indo($this->widget_model->CariWidgetByHariKanan2_2());
                $hasil2 = $this->app_model->tgl_str($this->widget_model->CariWidgetByHariKanan2_2());
                $hari = getday($hasil2,'/');
            ?>

            <a href="<?php echo base_url(); ?>widget/detail/<?php echo $linkWidgetByKananText2_2; ?>">
                <div id="detail-content-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $this->widget_model->CariWidgetByTimeKanan2_2();?></div>
                <h2><?php echo $this->widget_model->CariJudulIsiWidgetByKananText2_2();?></h2>
            </a>
            <img src="<?php echo base_url(); ?>uploads/widget/thumbs/<?php echo $this->widget_model->CariImageWidgetByKananText2_2(); ?>" width="280" height="120" />
            <?php
            $isi = $this->widget_model->CariIsiWidgetByKananText2_2();
            $isi = character_limiter($isi,150);
            echo $isi;
            ?>
        </div>
        <div class="cleaner_h10"></div>

        <?php
        foreach($all_post_by_wkanan_2_2 as $db):
            $link = set_permalink($db['post_id'],$db['post_judul']);
            $hasil = $this->app_model->tgl_indo($db['post_tgl']);
            $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
            $hari = getday($hasil2,'/');
            ?>
            <div id="title-sub-right-center-content">

                <a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>">
                    <div id="post-widget-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $db['post_time'];?></div>
                    <?php echo '- '. $db['post_judul']; ?></a>
            </div>
        <?php endforeach; ?>
        <div class="index-button">Indexs Berita</div>
    </div>

    <div class="cleaner_h5"></div>

    <div id="sub-right-center-content">
        <div id="single-sub-right-center-content">
            <div id="title-sub"><?php echo $this->widget_model->CariJudulWidgetByKananText3_1();?></div>
            <?php
                $id = $this->widget_model->CariIdWidgetByKananText3_1();
                $judul_isi = $this->widget_model->CariJudulIsiWidgetByKananText3_1();
                $linkWidgetByKananText3_1 = set_permalink($id,$judul_isi);
                $hasil = $this->app_model->tgl_indo($this->widget_model->CariWidgetByHariKanan3_1());
                $hasil2 = $this->app_model->tgl_str($this->widget_model->CariWidgetByHariKanan3_1());
                $hari = getday($hasil2,'/');
            ?>

            <a href="<?php echo base_url(); ?>widget/detail/<?php echo $linkWidgetByKananText3_1; ?>">
                <div id="detail-content-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $this->widget_model->CariWidgetByTimeKanan3_1();?></div>
                <h2><?php echo $this->widget_model->CariJudulIsiWidgetByKananText3_1();?></h2>
            </a>
            <img src="<?php echo base_url(); ?>uploads/widget/thumbs/<?php echo $this->widget_model->CariImageWidgetByKananText3_1(); ?>" width="280" height="120" />
            <?php
            $isi = $this->widget_model->CariIsiWidgetByKananText3_1();
            $isi = character_limiter($isi,150);
            echo $isi;
            ?>
        </div>
        <div class="cleaner_h10"></div>

        <?php
        foreach($all_post_by_wkanan_3_1 as $db):
            $link = set_permalink($db['post_id'],$db['post_judul']);
            $hasil = $this->app_model->tgl_indo($db['post_tgl']);
            $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
            $hari = getday($hasil2,'/');
            ?>
            <div id="title-sub-right-center-content">

                <a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>">
                    <div id="post-widget-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $db['post_time'];?></div>
                    <?php echo '- '. $db['post_judul']; ?></a>
            </div>
        <?php endforeach; ?>
        <div class="index-button">Indexs Berita</div>
    </div>

    <div id="sub-right-center-content">
        <div id="single-sub-right-center-content">
            <div id="title-sub"><?php echo $this->widget_model->CariJudulWidgetByKananText3_2();?></div>
            <?php
                $id = $this->widget_model->CariIdWidgetByKananText3_2();
                $judul_isi = $this->widget_model->CariJudulIsiWidgetByKananText3_2();
                $linkWidgetByKananText3_2 = set_permalink($id,$judul_isi);
                $hasil = $this->app_model->tgl_indo($this->widget_model->CariWidgetByHariKanan3_2());
                $hasil2 = $this->app_model->tgl_str($this->widget_model->CariWidgetByHariKanan3_2());
                $hari = getday($hasil2,'/');
            ?>

            <a href="<?php echo base_url(); ?>widget/detail/<?php echo $linkWidgetByKananText3_2; ?>">
                <div id="detail-content-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $this->widget_model->CariWidgetByTimeKanan3_2();?></div>
                <h2><?php echo $this->widget_model->CariJudulIsiWidgetByKananText3_2();?></h2>
            </a>
            <img src="<?php echo base_url(); ?>uploads/widget/thumbs/<?php echo $this->widget_model->CariImageWidgetByKananText3_2(); ?>" width="280" height="120" />
            <?php
            $isi = $this->widget_model->CariIsiWidgetByKananText3_2();
            $isi = character_limiter($isi,150);
            echo $isi;
            ?>
        </div>
        <div class="cleaner_h10"></div>
        <?php
        foreach($all_post_by_wkanan_3_2 as $db):
            $link = set_permalink($db['post_id'],$db['post_judul']);
            $hasil = $this->app_model->tgl_indo($db['post_tgl']);
            $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
            $hari = getday($hasil2,'/');
            ?>
            <div id="title-sub-right-center-content">

                <a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>">
                    <div id="post-widget-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $db['post_time'];?></div>
                    <?php echo '- '. $db['post_judul']; ?></a>
            </div>
        <?php endforeach; ?>
        <div class="index-button">Indexs Berita</div>
    </div>

    <div class="cleaner_h5"></div>
    <?php if($this->widget_model->CariPublishBanerByKanan1_3() == 'Y') { ?>
    <img src="<?php echo base_url(); ?>uploads/baner/thumbs/<?php echo $this->widget_model->CariImageBanerByKanan1_3(); ?>" style="width: 610px; height: 60px;" />
    <?php } ?>
    <div class="cleaner_h5"></div>

    <div id="sub-right-center-content">
        <div id="single-sub-right-center-content">
            <div id="title-sub"><?php echo $this->widget_model->CariJudulWidgetByKananText4_1();?></div>
            <?php
                $id = $this->widget_model->CariIdWidgetByKananText4_1();
                $judul_isi = $this->widget_model->CariJudulIsiWidgetByKananText4_1();
                $linkWidgetByKananText4_1 = set_permalink($id,$judul_isi);
                $hasil = $this->app_model->tgl_indo($this->widget_model->CariWidgetByHariKanan4_1());
                $hasil2 = $this->app_model->tgl_str($this->widget_model->CariWidgetByHariKanan4_1());
                $hari = getday($hasil2,'/');
            ?>

            <a href="<?php echo base_url(); ?>widget/detail/<?php echo $linkWidgetByKananText4_1; ?>">
                <div id="detail-content-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $this->widget_model->CariWidgetByTimeKanan4_1();?></div>
                <h2><?php echo $this->widget_model->CariJudulIsiWidgetByKananText4_1();?></h2>
            </a>
            <img src="<?php echo base_url(); ?>uploads/widget/thumbs/<?php echo $this->widget_model->CariImageWidgetByKananText4_1(); ?>" width="280" height="120" />
            <?php
            $isi = $this->widget_model->CariIsiWidgetByKananText4_1();
            $isi = character_limiter($isi,150);
            echo $isi;
            ?>
        </div>
        <div class="cleaner_h10"></div>

        <?php
        foreach($all_post_by_wkanan_4_1 as $db):
            $link = set_permalink($db['post_id'],$db['post_judul']);
            $hasil = $this->app_model->tgl_indo($db['post_tgl']);
            $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
            $hari = getday($hasil2,'/');
            ?>
            <div id="title-sub-right-center-content">

                <a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>">
                    <div id="post-widget-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $db['post_time'];?></div>
                    <?php echo '- '. $db['post_judul']; ?></a>
            </div>
        <?php endforeach; ?>
        <div class="index-button">Indexs Berita</div>
    </div>

    <div id="sub-right-center-content">
        <div id="single-sub-right-center-content">
            <div id="title-sub"><?php echo $this->widget_model->CariJudulWidgetByKananText4_2();?></div>
            <?php
                $id = $this->widget_model->CariIdWidgetByKananText4_2();
                $judul_isi = $this->widget_model->CariJudulIsiWidgetByKananText4_2();
                $linkWidgetByKananText4_2 = set_permalink($id,$judul_isi);
                $hasil = $this->app_model->tgl_indo($this->widget_model->CariWidgetByHariKanan4_2());
                $hasil2 = $this->app_model->tgl_str($this->widget_model->CariWidgetByHariKanan4_2());
                $hari = getday($hasil2,'/');
            ?>

            <a href="<?php echo base_url(); ?>widget/detail/<?php echo $linkWidgetByKananText4_2; ?>">
                <div id="detail-content-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $this->widget_model->CariWidgetByTimeKanan4_2();?></div>
                <h2><?php echo $this->widget_model->CariJudulIsiWidgetByKananText4_2();?></h2>
            </a>
            <img src="<?php echo base_url(); ?>uploads/widget/thumbs/<?php echo $this->widget_model->CariImageWidgetByKananText4_2(); ?>" width="280" height="120" />
            <?php
            foreach($all_post_by_wkanan_4_2 as $db):
                $link = set_permalink($db['post_id'],$db['post_judul']);
                $hasil = $this->app_model->tgl_indo($db['post_tgl']);
                $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
                $hari = getday($hasil2,'/');
                ?>
                <div id="title-sub-right-center-content">

                    <a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>">
                        <div id="post-widget-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $db['post_time'];?></div>
                        <?php echo '- '. $db['post_judul']; ?></a>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        foreach($all_post_by_wkanan_4_2 as $db):
            $link = set_permalink($db['post_id'],$db['post_judul']);
            $hasil = $this->app_model->tgl_indo($db['post_tgl']);
            $hasil2 = $this->app_model->tgl_str($db['post_tgl']);
            $hari = getday($hasil2,'/');
            ?>
            <div id="title-sub-right-center-content">

                <a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>">
                    <div id="post-widget-time"><?php echo $hari.', '.$hasil;?> &nbsp;&nbsp;<?php echo $db['post_time'];?></div>
                    <?php echo '- '. $db['post_judul']; ?></a>
            </div>
        <?php endforeach; ?>
        <div class="index-button">Indexs Berita</div>
    </div>


    <div class="cleaner_h5"></div>
    <?php if($this->widget_model->CariPublishBanerByKanan1_4() == 'Y') { ?>
    <img src="<?php echo base_url(); ?>uploads/baner/thumbs/<?php echo $this->widget_model->CariImageBanerByKanan1_4(); ?>" style="width: 610px; height: 60px;" />
    <?php } ?>
    <div class="cleaner_h40"></div>

</div>
<div class="cleaner_h0"></div>
