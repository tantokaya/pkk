<div class="row">
    <div class="col-md-9">
        <div class="box box-solid box-info">
            <div class="box-header">
                <i class="fa fa-calendar"></i>
                <div class="box-title">Kalender Agenda</div>

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
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
            </div><!-- /.box-body -->
        </div><!-- /. box -->
    </div><!-- /.col -->
</div><!-- /.row -->

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
                        <td><textarea id="desc" rows="5" cols="50"  disabled></textarea></td>
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
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>asset/admin/js/AdminLTE/app.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="<?php echo base_url();?>asset/admin/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- Calendar -->
<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/moment.js"></script>
<!-- Page specific script -->
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
    });
</script>