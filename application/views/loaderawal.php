<link href="<?php echo base_url('assets/load/loadawal.css') ?>" rel="stylesheet">
<script>

// Loading Page

var myVar;



function myFunction() {

myVar = setTimeout(showPage, 1300);

}



function showPage() {

document.getElementById("loader").style.display = "none";

document.getElementById("myDiv").style.display = "block";

}

</script>