<div id="center-content">
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
                <li><a href="javascript:void(0);" title="content_3" class="tab">Terkomentari</a></li>
            </ul>
            <div id="content_1" class="content">
                <ul>
                    <?php
                    foreach($all_new_post as $db):
                        $link = set_permalink($db['post_id'],$db['post_judul']);
                        ?>
                        <li><a href="<?php echo base_url(); ?>news/detail/<?php echo $link; ?>"><?php echo $db['post_judul'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div id="content_2" class="content">
                <ul>
                    <li>Kunci Sukses Bisnis Kamar Kos</li>
                    <li>ISTA Jakarta akan Gelar Pekan Raya Saintek</li>
                    <li>Kerajinan Batok Kelapa Bernilai Kreasi Larizo</li>
                    <li>4 Hal yang Perlu Diperhatikan Dalam Bisnis Kue Cupcake</li>
                    <li>Bisnis Basah Budidaya Perairan</li>
                    <li>Sering Mati Lampu, Buat UKM Thamrin City Rugi</li>
                    <li>10 Ide Usaha yang Pas di sekitar Pantai</li>
                </ul>
            </div>
            <div id="content_3" class="content">
                <ul>
                    <li>Sering Mati Lampu, Buat UKM Thamrin City Rugi</li>
                    <li>10 Ide Usaha yang Pas di sekitar Pantai</li>
                    <li>ISTA Jakarta akan Gelar Pekan Raya Saintek</li>
                    <li>Kerajinan Batok Kelapa Bernilai Kreasi Larizo</li>
                    <li>Kerajinan Batok Kelapa Bernilai Kreasi Larizo</li>
                    <li>10 Ide Usaha yang Pas di sekitar Pantai</li>
                    <li>Kunci Sukses Bisnis Kamar Kos</li>
                    <li>Real Setop Hat-trick Barca</li>
                    <li>10 Ide Usaha yang Pas di sekitar Pantai</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="cleaner_h10"></div>

</div>


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

    <h3><?php echo $this->post_model->CariPageByJudul();?></h3>
    <div id="content-attribute">
        <span style="float:left; width:200px; text-align:left;"></span>
        <span style="float:right; width:390px; text-align:right;">Dibaca: <strong>57</strong> kali | <strong>0</strong> komentar | Share
        <script language="javascript">
            document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'> Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'> Facebook</a> ");
        </script></span>
        <div class="cleaner_h0"></div>
    </div>
    <div class="cleaner_h10"></div>
    <!--<div id="detail-img-with-article">
        <img src="<?php echo base_url(); ?>asset/images/blank.jpg" width="300" height="200" />
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
    </div>-->
    <?php echo $this->post_model->CariPageByIsi(); ?>

    <div class="cleaner_h20"></div>

    <div id="content-attribute">
        <span style="float:left; width:200px; text-align:left;"> </span>
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


    <div class="cleaner_h5"></div>
    <?php if($this->widget_model->CariPublishBanerByKanan1_4() == 'Y') { ?>
        <img src="<?php echo base_url(); ?>uploads/baner/<?php echo $this->widget_model->CariImageBanerByKanan1_4(); ?>" style="width: 610px; height: 60px;" />
    <?php } ?>
    <div class="cleaner_h40"></div>

</div>
<div class="cleaner_h0"></div>

</div>