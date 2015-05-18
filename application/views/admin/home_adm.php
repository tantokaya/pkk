<!DOCTYPE html>
<html>
    <head>
        <?php include "incl_adm.php"; ?>

    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <?php include "header_adm.php"; ?>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <?php
                if($this->session->userdata('id_level')=='01'){
                    echo $this->load->view('admin/sidebar_adm');
                }elseif($this->session->userdata('id_level')=='02'){
                    echo $this->load->view('admin/sidebar_adm');
                }else{
                    echo $this->load->view('admin/sidebar_user');
                }
                ?>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <?php include "breadcumb_adm.php"; ?>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php  echo $content; ?>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->




    </body>
</html>