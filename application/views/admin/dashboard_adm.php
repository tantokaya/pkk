<script type="text/javascript">
    $(document).ready(function(){

        tampil_data();

        function tampil_data(){
            $.ajax({
                type	: 'POST',
                url		: "<?php echo site_url(); ?>adpus/DataDetail",
                success	: function(data){
                    $("#tampil_data").html(data);
                }
            });
            //return false();
        }

        $("#kirim").click(function(){
            var pesan	= $("#pesan").val();

            var string = $("#message-form").serialize();

            $.ajax({
                type	: 'POST',
                url		: "<?php echo site_url(); ?>adpus/kirim",
                data	: string,
                cache	: false,
                success	: function(data){
                    tampil_data();
                    $("#pesan").val('');
                }
            });
            return false();
        });

        $('#pesan').keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                $("#kirim").click();
            }
        });


    });
</script>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>
                    <?php echo $this->app_model->HitungAllPostByJudul(); ?> <sup style="font-size: 20px"> post</sup>
                </h3>
                <p>
                    Berita
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url(); ?>post" class="small-box-footer">
                Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    <?php echo $this->statistik_model->total_hits(); ?> <sup style="font-size: 20px"> hits</sup>
                </h3>
                <p>
                    Pengunjung
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
                Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    <?php echo $this->app_model->HitungAllPengguna(); ?>
                </h3>
                <p>
                    User Yang Terdaftar
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
                Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    <?php echo $jumlah_pengunjung; ?>
                </h3>
                <p>
                    Jumlah Pengunjung hari ini
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
                Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->

<!-- top row -->
<div class="row">
    <div class="col-xs-12 connectedSortable">

    </div><!-- /.col -->
</div>
<!-- /.row -->

<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-6 connectedSortable">
    <!-- Box (with bar chart) -->

    <!-- Calendar -->
    <div class="box box-solid box-info">
        <div class="box-header">
            <i class="fa fa-calendar"></i>
            <div class="box-title">Kalender</div>

            <!-- tools box -->
            <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                    <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="<?php echo base_url();?>agenda/tambah">Jadwal Agenda Baru</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>kalender">Kalender Besar</a></li>
                    </ul>
                </div>
            </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar"></div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.Left col -->


<!-- right col (We are only adding the ID to make the widgets sortable)-->
<section class="col-md-6" >
<!-- Chat box -->
<div class="box box-solid box-warning"  >
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-comments-o"></i> Chat</h3>
        <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
            <div class="btn-group" data-toggle="btn-toggle" >
<!--                <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>-->
<!--                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>-->
            </div>
        </div>
    </div>
    <div class="box-body"  id="chat-box" >
        <div class="item">
            <div id="tampil_data" ></div>
        </div><!-- /.item -->
    </div><!-- /.chat --><br/><br/><br/>
    <div class="box-footer">

        <div class="form-group">
            <form id="message-form" method="post">
            <div class="col-sm-10">
            <input type="text" class="form-control" name="pesan" id="pesan"  placeholder="Write here..." >
            </div>
            <div class="input-group-btn">
                <button type="button" id="kirim" class="btn btn-success"><i class="fa fa-plus"></i></button>
            </div>
            </form>
        </div>

    </div>
</div><!-- /.box (chat box) -->

</section><!-- right col -->
</div><!-- /.row (main row) -->


<div class="row">
<!-- Left col -->
<section class="col-lg-6 connectedSortable">
    <!-- Box (with bar chart) -->
    <div class="box-body table-striped">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>topik</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><a href="<?php echo base_url();?>forum/perkenalan"><i class="fa fa-fw fa-rss"></i></a> </td>
                <td>
                    <a href="<?php echo base_url();?>forum/perkenalan"><b>Selamat Datang & Perkenalan</b><br/></a>
                    <p style="font-size: 12px">Selamat datang di Forum Komunitas Teknopark - Silahkan perkenalkan diri anda di sini. </p><br/>
                    <p style="font-size: 11px">Pesan Terakhir - </p>
                </td>
                <td><p style="font-size: 15px"><?php echo $jml_topik_perkenalan; ?></p></td>
            </tr>
            <tr>
                <td><a href="<?php echo base_url();?>forum/pengumuman"><i class="glyphicon glyphicon-bullhorn"></i> </a> </td>
                <td>
                    <a href="<?php echo base_url();?>forum/pengumuman"><b>Pengumuman</b></a>
                    <p style="font-size: 12px">Pengumuman dari Kegiatan Puskomkreatif.</p><br/>
                    <p style="font-size: 11px">Pesan Terakhir -</p>
                </td>
                <td><p style="font-size: 15px"></p><?php echo $jml_topik_pengumuman; ?></td>
            </tr>
            <tr>
                <td><a href="<?php echo base_url();?>forum/saran"><i class="glyphicon glyphicon-tags"></i> </a> </td>
                <td>
                    <a href="<?php echo base_url();?>index.php/forum/saran"><b>Saran untuk forum</b></a>
                    <p style="font-size: 12px">Pengguna yang sudah terdaftar dapat memberikan saran dan kritik mengenai Forum Komunitas Puskomkreatif ini. </p><br/>
                    <p style="font-size: 11px">Pesan Terakhir - </p>
                </td>
                <td><p style="font-size: 15px"><?php echo $jml_topik_saran; ?></p></td>
            </tr>
            <tr>
                <td><a href="<?php echo base_url();?>forum/pojok"><i class="fa fa-users"></i> </a> </td>
                <td>
                    <a href="<?php echo base_url();?>forum/pojok"><b>Pojok Komunitas</b></a>
                    <p style="font-size: 12px">Pengguna yang sudah terdaftar dapat berdiskusi, diskusi dengan topik yang umum dan tentu saja saling mengenal antara pengguna forum ini. </p><br/>
                    <p style="font-size: 11px">Pesan Terakhir - </p>
                </td>
                <td><p style="font-size: 15px"><?php echo $jml_topik_pojok; ?></p></td>
            </tr>
            </tbody>

        </table>
    </div><!-- /.box-body -->

</section><!-- /.Left col -->


</div><!-- /.row (main row) -->

<!-- add new calendar event modal -->
<!-- START MODAL EVENT DETAIL -->
<div id="eventDetailModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h3 id="modalTitle" class="modal-title"></h3>
            </div>
            <div id="modalBody" class="modal-body">
                <table class="table table-hover table-nomargin table-striped">
                    <tr>
                        <td>Tanggal Mulai</td>
                        <td>:</td>
                        <td id="start"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Akhir</td>
                        <td>:</td>
                        <td id="end"></td>
                    </tr>
                    <tr>
                        <td>Lokasi</td>
                        <td>:</td>
                        <td id="location"></td>
                    </tr>
                    <tr>
                        <td>Mitra</td>
                        <td>:</td>
                        <td id="mitra"></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td><textarea id="desc" rows="5" class="input-block-level" disabled></textarea></td>
                    </tr>
                    <tr>
                        <td>Nama Pembuat</td>
                        <td>:</td>
                        <td id="nama"></td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>:</td>
                        <td id="tlp"></td>
                    </tr>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- END MODAL EVENT DETAIL -->

<!-- jQuery 2.0.2 -->
<script src="<?php echo base_url();?>asset/admin/js/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="<?php echo base_url();?>asset/admin/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>asset/admin/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>asset/admin/js/raphael-min.js"></script>
<script src="<?php echo base_url();?>asset/admin/js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>asset/admin/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>asset/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="<?php echo base_url();?>asset/admin/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>asset/admin/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>asset/admin/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>asset/admin/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url();?>asset/admin/js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="--><?php //echo base_url();?><!--asset/admin/js/AdminLTE/dashboard.js" type="text/javascript"></script>-->

<!-- Calendar -->
<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/moment.js"></script>
<script type="text/javascript">
    $(function() {
        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {//This is to add icons to the visible buttons
                prev: "<span class='fa fa-caret-left'></span>",
                next: "<span class='fa fa-caret-right'></span>",
                today: 'Hari ini',
                month: 'Bulan',
                week: 'Minggu',
                day: 'Hari'
            },
            //Random default events
            events: '<?php echo base_url('home/generate_event'); ?>',
            editable: false,
            eventClick:  function(event, jsEvent, view) {
                $('#modalTitle').html(event.title);
                $('#start').html(moment(event.start).format('LL'));
                //console.log(event.start+'\n');
                end = event.end;
                if(end === null){
                    end = event.start;
                }
                //console.log(end+'\n');
                $('#end').html(moment(end).format('LL'));
                $('#location').html(event.location);
                $('#desc').html(event.description);
                $('#mitra').html(event.mitra);
                $('#nama').html(event.nama);
                $('#tlp').html(event.tlp);

                //$('#eventUrl').attr('href',event.url);
                $('#eventDetailModal').modal();
            }
        });

        //SLIMSCROLL FOR CHAT WIDGET
        $('#chat-box').slimScroll({
            height: '320px'

        });


    });
</script>