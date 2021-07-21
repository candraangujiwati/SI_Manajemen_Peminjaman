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
            <i class="fas fa-info"></i>
            Detail Barang</div>

          <div class="card-body">
            <div class="table-responsive">
              
          <?php 
        
        foreach($barang as $u){
            ?>
           <ul> 
           <li><h6> ID Barang : <?php echo $u->id_barang;?></h6></li>
           <li><h6> Jenis Barang : <?php echo $u->jenis_barang;?></h6></li>
           <li><h6> Kode Barang : <?php echo $u->kode_barang;?></h6></li>
           <li><h6> Nama Barang : <?php echo $u->nama_barang;?></h6></li>
           <li><h6> Merk Barang : <?php echo $u->merk;?></h6></li>
           <li><h6> Jumlah Barang : <?php echo $u->jumlah;?></h6></li>
           <li><h6> Keterangan Barang : <?php echo $u->keterangan;?></h6></li>
           <li><h6> Foto Barang : 
             </h6></li>
            <img src="<?php echo base_url();?>./assets/images_barang/<?php echo $u->foto_barang;?>" alt="" style="width:400px; height:400px;">
           
           </ul>
            <?php 
          }
          ?>
         <a href="<?php echo base_url().'penggunabarang/cekbarang'; ?>" class="btn btn-primary" value="Kembali">Kembali</a>
               <br>
                  
          </div>
        </div>
      </div>
    </div>
    
   </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("pengguna_barang/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("pengguna_barang/_partials/scrolltop.php") ?>
<?php $this->load->view("pengguna_barang/_partials/modal.php") ?>
<?php $this->load->view("pengguna_barang/_partials/js.php") ?>
    
</body>
</html>