<meta charset="UTF-8">
<title>Puskomkreatif | <?php echo $judul_halaman; ?></title>
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/puskom_icon.ico" />
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- bootstrap 3.0.2 -->
<link href="<?php echo base_url();?>asset/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="<?php echo base_url();?>asset/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="<?php echo base_url();?>asset/admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url();?>asset/admin/css/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- ICheck -->
<link href="<?php echo base_url();?>asset/admin/css/iCheck/all.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url();?>asset/admin/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- fullCalendar -->
<link href="<?php echo base_url();?>asset/admin/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url();?>asset/admin/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url();?>asset/admin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo base_url();?>asset/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />
<!-- Upload Thumbnail -->
<link href="<?php echo base_url();?>asset/admin/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>asset/admin/js/html5shiv.js"></script>
<script src="<?php echo base_url();?>asset/admin/js/respond.min.js"></script>
<![endif]-->

<!-- DATA TABLES -->
<link href="<?php echo base_url();?>asset/admin/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

<!--  DATE PICKER -->
<link rel="stylesheet" href="<?php echo base_url();?>asset/admin/css/jquery-ui.css">
<script src="<?php echo base_url();?>asset/admin/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url();?>asset/admin/js/jquery-ui.js"></script>
<script>

    jQuery(document).ready(function($) {
        $( "#mulai" ).datepicker({
            dateFormat: "dd/mm/yy"
        });
        $( "#akhir" ).datepicker({
            dateFormat: "dd/mm/yy"
        });
    });

</script>

<!-- File uploader -->
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/css/fileuploader.css">

<!--GRAFIK-->
<script src="<?php echo base_url(); ?>asset/js/1.8.2.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/highcharts/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/highcharts/modules/exporting.js"></script>

