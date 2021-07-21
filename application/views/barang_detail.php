<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("tamu_barang/head.php") ?>
</head>
<body id="page-top">
<?php $this->load->view("tamu_barang/navbar.php") ?>
<div id="wrapper">
  <div id="content-wrapper">
    <div class="container-fluid">
        <div class="container-fluid">
        <h2 >Informasi Barang</h2>
        <hr style="border: 1px solid">
<div class="col-lg-9 col-sm-8 ">
<?php  
  foreach ($barang->result_array() as $value) {
    $id_barang         = $value['id_barang'];
    //$kode_barang      = $value['kode_barang'];
    $nama_barang      = $value['nama_barang'];
    $merk      = $value['merk'];
    $jumlah  = $value['jumlah'];
    $keterangan     = $value['keterangan'];
    $foto_barang      = $value['foto_barang']; 
    $qr_code      = $value['qr_code'];
    $jenis_barang = $value['jenis_barang'];
  }
?>
<h3>Nama Barang : <?php echo $nama_barang;?></h3>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
         <?php
        foreach ($barang->result_array() as $value) { ?>
           <?php
            if ($foto_barang) { ?>
             <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
             <?php
            }
            else { ?>
             <li data-target="#myCarousel" data-slide-to="<?php echo $foto_barang;?>" class=""></li>
             <?php
            }
        }
            ?>
      </ol>
      <div class="carousel-inner">
        <?php
        foreach ($barang->result_array() as $value) { ?>
            <?php
            if ( $foto_barang) { ?>
              <div class="item active">
                <img src="<?php echo base_url();?>assets/images_barang/<?php echo $value['foto_barang'];?>" class="properties" alt="properties" />
              </div>
         <?php
            }
            else { ?>
          <div class="item">
                <img src="<?php echo base_url();?>assets/images_barang/<?php echo $value['foto_barang'];?>" class="properties" alt="properties" />
              </div> 
            <?php
            }
        }
       ?>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="fa fa-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->
</div>
  <div class="spacer"><h4><span class="fa fa-tags"></span> Keterangan Barang</h4>
  <p><?php echo $keterangan;?></p> 
  </div>
  </div>
    <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
</div>
<h5><span class="fa fa-archive"></span> Jumlah yang tersedia : <?php echo $jumlah;?></h5>
<h5><span class="fa fa-qrcode"></span> QR Code Barang </h5>
<?php
        /*foreach ($barang->result_array() as $value) { ?>
            <?php
            if ( $qr_code) { */?>
                  <img src="<?php echo base_url();?>assets/qr_code_barang/<?php echo $qr_code;?>" class="properties" alt="properties" />
          
   <div class="listing-detail">
    
</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">

 
  </div>
 </div>         
</div>
  </div>
</div>

    <!-- /.iron-card -->
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("tamu_barang/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("tamu_barang/scrolltop.php") ?>
<?php $this->load->view("tamu_barang/modal.php") ?>
<?php $this->load->view("tamu_barang/js.php") ?>
    
</body>
</html>