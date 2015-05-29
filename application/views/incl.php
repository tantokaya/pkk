<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title.' | '.$title_aplikasi; ?></title>
<meta name="description" content="<?php echo $descriptions; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>"/>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/clock.js"></script>
<script language="javascript" src="<?php echo base_url();?>asset/js/jquery.ticker.js"></script>
<script language="javascript" src="<?php echo base_url();?>asset/js/site.js"></script>
<script src="<?php echo base_url();?>asset/js/s3Slider.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" type="text/css" />

<?php
   if($this->uri->segment(2)== ''){
?>
<script>
    $(document).ready(function() {
        $('#slider').s3Slider({
            timeOut: 6000
        });
    });
</script>
<?php  } ?>