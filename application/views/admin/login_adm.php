<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title>Puskomkreatif | Sign in</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/favicon.ico" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="<?php echo base_url();?>asset/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo base_url();?>asset/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url();?>asset/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->
    <script type="text/javascript">
        function validasi(form){
            if (form.username.value == ""){
                alert("Anda belum mengisikan Username");
                form.username.focus();
                return (false);
            }

            if (form.password.value == ""){
                alert("Anda belum mengisikan Password");
                form.password.focus();
                return (false);
            }
            return (true);
        }
    </script>
</head>
<body class="bg-black">

<div class="form-box" id="login-box">
    <div class="header"><i class="fa fa-lock"></i> &nbsp;Puskomkreatif Login</div>
    <?php echo form_open('adpus/index'); ?>
        <div class="body bg-gray">
            <div class="form-group">
                <?php echo form_input($username); ?>
            </div>
            <div class="form-group">
                <?php echo form_input($password); ?>
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember_me"/> Remember me
            </div>
        </div>
        <div class="footer">
<!--            <button type="submit" name="login" class="btn bg-olive btn-block">-->
            <?php echo form_button($submit,'Login');?>
                <i class="fa fa-lock"></i> Sign me in</button>

            <p><a href="#">Lupa password ? </a></p>
        </div>
    <?php echo form_close(); ?>


</div>


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>asset/admin/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>