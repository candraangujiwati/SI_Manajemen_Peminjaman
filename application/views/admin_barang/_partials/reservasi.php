<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
var dtToday = new Date ();
var month = dtToday.getMonth()+1;
var day = dtToday.getDate();
var year = dtToday.getFullYear();
if (month<10)
month = '0' +month.toString();
if (day <10)
day ='0' + day.toString();
var maxDate = year + '-' + month + '-' +day;
$('#dateControl').attr('min', maxDate);
})
</script>

<script>
$(document).ready(function() {
var dtToday = new Date ();
var month = dtToday.getMonth()+1;
var day = dtToday.getDate();
var year = dtToday.getFullYear();
if (month<10)
month = '0' +month.toString();
if (day <10)
day ='0' + day.toString();
var maxDate = year + '-' + month + '-' +day;
$('#dateControl2').attr('min', maxDate);
})
</script>
