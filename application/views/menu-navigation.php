<script type="text/javascript">
    $(document).ready(function(){

        tampil_data();

        function tampil_data(){
            $.ajax({
                type	: 'POST',
                url		: "<?php echo site_url(); ?>pages/MenuUtama",
                success	: function(data){
                    $("#tampil_data").html(data);
                }
            });
            //return false();
        }
    });
</script>

<ul id="nav">
    <div id="tampil_data" ></div>
</ul>