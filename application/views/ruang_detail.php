<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("tamu/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("tamu/navbar.php") ?>

<div id="wrapper">

  <div id="content-wrapper">

    <div class="container-fluid">

        <div class="container-fluid">
          
        <h2 >Informasi Ruang</h2>
        <hr style="border: 1px solid">
<div class="col-lg-9 col-sm-8 ">
<?php  

  foreach ($ruang->result_array() as $value) {
    $id_ruang         = $value['id_ruang'];
    $nama_ruang      = $value['nama_ruang'];
    $kapasitas      = $value['kapasitas'];
    $fasilitas_ruang  = $value['fasilitas_ruang'];
    $area     = $value['area'];
    $waktu_sesi = $value['waktu_sesi'];
    $gambar      = $value['gambar']; 
    $status_ruang = $value['status_ruang'];
  }
?>

<h3>Nama Ruang : <?php echo $nama_ruang;?></h3>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
         <?php
        foreach ($ruang->result_array() as $value) { ?>
           <?php
            if ($gambar) { ?>
             <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
             <?php
            }
            else { ?>
             <li data-target="#myCarousel" data-slide-to="<?php echo $gambar;?>" class=""></li>
             <?php
            }
            ?>
         <?php
        }
       
        ?>
      </ol>
      <div class="carousel-inner">
       
        <?php
       
        foreach ($ruang->result_array() as $value) { ?>
            <?php
            if ( $gambar) { ?>
              <div class="item active">
                <img src="<?php echo base_url();?>assets/images/<?php echo $value['gambar'];?>" class="properties" alt="properties" />
              </div>

            <?php
            }
            else { ?>

              <div class="item">
                <img src="<?php echo base_url();?>assets/images/<?php echo $value['gambar'];?>" class="properties" alt="properties" />
              </div> 
            <?php
            }
            ?>

        <?php
        }
       
        ?>
       
        

        
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="fa fa-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  <div class="spacer"><h3><span class="fa fa-th-list"></span> Fasilitas Ruang</h3>
  <h4><p><?php echo $fasilitas_ruang;?></p></h4> 
  </div>
  
  

  </div>


  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price"><?php //echo rupiah($harga_kamar);?></p>
 
  
 
</div>
   <div class="listing-detail">
    
</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">

  <?php

  if ($status_ruang==0) { ?>
<!--
  <h6><span class="fa fa-envelope"></span> Pemesanan Ruang</h6>
  <?php //echo form_open('welcome/reservasi/','role="form"'); ?>
    <input type="hidden" name="id_ruang" value="<?php //echo $id_ruang;?>">
     <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
       <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                            <input class="form-control"  type="text" name="tgl_pesan" placeholder="Tanggal Pesan" autocomplete="off">

                                            

                                                        </div>
                                                        <br>
      <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
       <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                            <input class="form-control"  type="text" name="tgl_pinjam" placeholder="Tanggal Pinjam" autocomplete="off">

                                            

                                                        </div>
                                                        <br>
                <input type="text" class="form-control" name="nama_kegiatan" placeholder="Nama Kegiatan"/>
                <input type="text" class="form-control" name="nama_peminjam" placeholder="Nama Peminjam"/>
                <input type="number" class="form-control" name="no_hp_peminjaman" placeholder="No Hp Peminjam"/>
               
      <button type="submit" class="btn btn-primary" name="Submit">Booking Ruang</button>
     
      <?php //echo form_close();?>
-->
  <?php
  }
  else 
  { ?>
  <h3>Peminjam :</h3>
  <?php  
//print_r($peminjaman->result_array());exit;
foreach ($peminjaman->result_array() as $value){
  $id_peminjaman			= $value['id_peminjaman'];
  $tgl_pinjam	= $value['tgl_pinjam'];
  $tgl_selesai	= $value['tgl_selesai'];
  $nama_kegiatan	 		= $value['nama_kegiatan'];
  $id_user	 		= $value['id_user'];
  $nama	 		= $value['nama'];
  $no_hp_peminjam			= $value['no_hp_peminjam'];
  $email	 		= $value['email'];
  $surat	 		= $value['surat'];
  $id_ruang 				= $value['id_ruang'];
  $nama_ruang 			= $value['nama_ruang'];
  $status_ruang			= $value['status_ruang'];
  $status_pinjam			= $value['status_pinjam'];
  $id_sesi 				= $value['id_sesi'];
  $waktu_sesi 				= $value['waktu_sesi'];
  $id_opd			= $value['id_opd'];
  $nama_opd 				= $value['nama_opd'];
  //print_r($waktu_sesi);exit;
}
  
?>
<h5><span class="fa fa-calendar"></span>   Tangggal Pinjam :      <?php echo $tgl_pinjam;?></h5>
<h5><span class="fa fa-calendar"></span>   Tangggal Selesai : <?php echo $tgl_selesai;?></h5>
<h5><span class="fa fa-calendar"></span>   Sesi : <?php echo $waktu_sesi;?></h5>
<h5><span class="fa fa-user"></span>   Nama Peminjam : <?php echo $nama;?></h5>
<h5><span class="fa fa-phone-square"></span >   No. Hp Peminjam : <?php echo $no_hp_peminjam;?></h5>
<h5><span class="fa fa-home"></span>   Asal OPD : <?php echo $nama_opd;?></h5>

<div class='alert alert-danger'>
<span>Ruang Tidak Tersedia</span>  
</div>

  <?php
  }

  ?>
  </div>
 </div>         
</div>
  </div>
</div>

    <!-- /.iron-card -->
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("tamu/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("tamu/scrolltop.php") ?>
<?php $this->load->view("tamu/modal.php") ?>
<?php $this->load->view("tamu/js.php") ?>
    
</body>
</html>