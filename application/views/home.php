<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <?php include "incl.php"; ?>

</head>

<body onLoad="goforit()">
<div id="line-top">
    <div id="center-line-top">
        <div style="padding:5px;">
            <?php include "hot_news.php"; ?>
        </div>
    </div>
</div>

<div class="cleaner_h30"></div>
<div id="line-header">
<div id="center-header">
    <div id="left-center-header">
        <img src="<?php echo base_url();?>uploads/panel/thumbs/<?php echo $this->widget_model->CariImageLogo(); ?>" />
    </div>
    <div id="right-center-header">
        <div id="menu-right-center-header">
            <!--<a href="">Tentang Kami</a> | <a href="">Hubungi Kami</a> | <a href="">Forum</a> | <a href="">Galeri</a> | <a href="">FB</a> | <a href="">Twitter</a>-->
        </div>
        <div id="w2b-searchbox">
            <form id="w2b-searchform" action="pencarian" method="POST">
                <input type="text" id="s" name="key" value="Search..." onfocus='if (this.value == "Search...") {this.value = ""}' onblur='if (this.value == "") {this.value = "Search...";}'/>
                <input type="image" src="<?php echo base_url(); ?>asset/images/blank.gif" id="sbutton" />
            </form>
        </div>
        <div class="cleaner_h0"></div>
        <div id="date-right-center-header">
            Selamat datang pengunjung | <script src="<?php echo base_url();?>asset/js/clock.js" type="text/javascript"></script><span id="clock"></span>
        </div>
    </div>
</div>
<div id="line-menu">
    <div id="navigation">
        <?php include "menu-navigation.php" ?>
        <div class="cleaner_h0"></div>
    </div>
</div>
<div id="content">
    <div id="center-content">
        <?php include "left-content.php"; ?>
        <?php echo $content; ?>
    </div>
</div>

<div id="footer-menu">
    <div id="center-footer-menu">Home | Tentang Kami | Hubungi Kami | Forum | Kritik dan Saran | Galeri | Facebook | Twitter</div>
</div>

<div id="footer">
    <div id="center-footer">
        <?php foreach($all_panel as $db):
            echo $db['panel_copyright'];
            echo '<br/>';
            echo $db['panel_alamat'];
        endforeach; ?>
        <br />
    </div>
</div>
</body>
</html>
