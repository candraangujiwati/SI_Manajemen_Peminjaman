<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">
  <?php $this->load->view("pengguna_barang/_partials/head.php") ?>
</head>
<body id="page-top">
  <!-- Loading Page -->
  <?php $this->load->view("pengguna_barang/_partials/loader.php") ?>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<?php $this->load->view("pengguna_barang/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("pengguna_barang/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">

    <?php $this->load->view("pengguna_barang/_partials/breadcrumb.php") ?>
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-camera"></i>
           Scan QR Code</div>
           <section class='content'>

          <div class="container text-center" id="QR-Code ">
              <div class="panel panel-info">
                  <div class="panel-heading">
                      <div class="navbar-form navbar-center">
                          <h4>Arahkan QR Code ke kamera</h4>
                      </div>
                      <div class="navbar-form navbar-center">
                          <select class="form-control" id="camera-select"></select>
                      </div>
                  </div>
                  <div class="panel-body text-center">
                      <div class="col-md-11 ">
                          <div class="well" style="position: middle;">
                              <canvas width="400" height="400" id="webcodecam-canvas"></canvas>
                              <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                              <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                              <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                              <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                          </div>
                      </div>
                  </div>
                </div><!-- /.box-body -->

              </section><!-- /.content -->
              






         
          </div>
        </div>
      </div>
    </div>
    
   </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("pengguna_barang/_partials/scrolltop.php") ?>
<?php $this->load->view("pengguna_barang/_partials/modal.php") ?>
<?php $this->load->view("pengguna_barang/_partials/js.php") ?>
<?php $this->load->view("pengguna_barang/_partials/scan.php") ?>
<?php $this->load->view("pengguna_barang/_partials/cekscan.php") ?>
</body>
</html>