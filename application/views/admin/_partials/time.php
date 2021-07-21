<!--time picker-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script  type="text/javascript">
$(document).ready(function(){
    $('input.timepicker').timepicker({
      timeFormat: 'hh:mm p',
      dropdown: true,
    scrollbar: true
    });
});
</script>