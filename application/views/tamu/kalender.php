<!--<script src="<?php //echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php //echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>
  <!--calendar-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <!--skrip kalender-->
    <script>
   $(document).ready(function(){ 
       var calendar = $('#calendar').fullCalendar({
       //editable:true,
       //editable:true,
       dataType:"json",
       header:{
           left:'prev,next today',
           center:'title',
           right:'month'
       },
       events: "<?php echo base_url();?>Welcome/load",
       selectable:true,
       selectHelper:true,
   });
}); 
</script>