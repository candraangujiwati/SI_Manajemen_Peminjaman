<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view("tamu/head.php") ?>
</head>

<body id="page-top">
  <!-- Loading Page -->
 <?php $this->load->view("pengguna/_partials/loader.php") ?>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<?php $this->load->view("tamu/navbar.php") ?>
<div id="wrapper"> 
   
    <div id="content-wrapper">
        
    <div class="container-fluid">

    <hr style="border: 3px solid">
    <a href="<?php echo base_url().'welcome'; ?>" class="btn btn-dark" value="Kembali" style="font-family: Arial; font-size: 16px; margin-bottom: 10px">Kembali</a>
                    
    <div class="card mb-3">
          <div class="card-header" align="center" style="font-size: 25px">
           Alur Peminjaman Ruang
        </div>
        <div class="card-body">
            <div class="table-responsive">
 <div class="container-fluid">
      <center>
          <img style="width: 500px; height: 500px" src="./assets/gambar_alur/ruang.jpg">
</center>
</div>
</div>        
</div>
 <!--Sticky Footer -->
                    </div>
                    <?php $this->load->view("tamu/footer.php") ?>
 
                    </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php $this->load->view("tamu/scrolltop.php") ?>
<?php $this->load->view("tamu/modal.php") ?>
<?php //$this->load->view("kalender.php") ?>


</body>
</html>