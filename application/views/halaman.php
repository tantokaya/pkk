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
        <span style="float:right; width:390px; text-align:right;">Share
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
    Share
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
