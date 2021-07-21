<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">

  <?php $this->load->view("admin_barang/_partials/head.php") ?>
</head>
<body id="page-top">
<!-- Loading Page -->
<?php $this->load->view("admin_barang/_partials/loader.php") ?>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<?php $this->load->view("admin_barang/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("admin_barang/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">

    <?php $this->load->view("admin_barang/_partials/breadcrumb.php") ?>
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-qrcode"></i>
            QR Code</div>

          <div class="card-body">
            <div class="table-responsive">
              
          <?php 
        
        foreach($barang as $u){
            ?>
           <ul> 
           <li><h6> Nama Barang : <?php echo $u->nama_barang;?></h6></li>
           <li><h6> QR Code : </h6></li>
             <img style="width: 300px; length: 300px;" src="<?php echo base_url()?>./assets/qr_code_barang/<?php echo $u->qr_code;?>">
           </ul>
            <?php 
          }
          ?>
         <a href="<?php echo base_url().'adminbarang/barang'; ?>" class="btn btn-primary" value="Kembali">Kembali</a>
         <a href="<?php echo base_url().'adminbarang/cetakqr/'.$u->id_barang; ?>" class="btn btn-success" value="Cetak QR Code"> <i class="fas fa-print"></i> Cetak QR Code</a>
               <br>
                  
          </div>
        </div>
      </div>
    </div>
    
   </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("admin_barang/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin_barang/_partials/scrolltop.php") ?>
<?php $this->load->view("admin_barang/_partials/modal.php") ?>
<?php $this->load->view("admin_barang/_partials/js.php") ?>
    
</body>
</html>