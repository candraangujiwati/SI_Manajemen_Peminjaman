<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">

  <?php $this->load->view("tamu/head.php") ?>

</head>

<body id="page-top">
<?php $this->load->view("tamu/navbar.php") ?>

    <div id="wrapper"> 
       
    <div id="content-wrapper">
 
    <div class="container-fluid"> 
      
    <div class="row">
    <div class="form-group col-md-2" style="font-size: 20px">
        <button class="btn" style="background:#B0E0E6; border:3px solid #0000FF"></button> Pengajuan
    </div>
    <div class="form-group col-md-5" style="font-size: 20px">  
        <button class="btn" style="background:#98FB98; border:3px solid #008000"></button> Sudah Disetujui
        </div>
    </div>

    <div id="calendar"></div>
</div>

 <!-- search box-->
 <div class="container-fluid">
 <hr style="border: 5px solid">
<h3>Daftar Ruang :</h3>
          <div class="search-form"><h4><span class="fa fa-search" style="font-size: 17px"></span> Cari Ruang :</h4>
            <?php echo form_open('welcome/cari');?>
          <div class="row">
          <div class="col-lg-12">
          <select class="form-control" name="nama_ruang">
                <option value="nama_ruang">-Pilih Ruang-</option>
                <?php
                foreach ($ruang2->result_array() as $value) { 
                    ?>
                   <option value="<?php echo $value['nama_ruang'];?>"><?php echo $value['nama_ruang'];?></option>
                <?php
                }
           
                ?>
              </select>
              </div>
          </div>
          <br>
          <button class="btn btn-primary" style="font-size: 18px; font-family: Arial">Temukan sekarang </button>
<?php echo form_close();?>
        </div>
      <!--end search box-->


    <!-- Icon Cards-->
<div class="row">
    <?php //print_r($ruang->result_array()); exit; 
    foreach ($ruang3->result_array() as $value) {
  ?>
      <div class="col-xl-3 col-sm-6 mb-3" >
      <div class="properties" style="background-color: white; ">
        <div class="text-black font-weight-bold center">
             <img src="<?php echo base_url();?>/assets/images/<?php echo $value['gambar'];?>" class="img-responsive" alt="properties" style="width:278.5px;height:150px;">
            <?php
               if ($value['status_ruang'] == '0' ) { ?>
                  <div class="card-body status sold">
                <div style="color: white; font-size: 17px"> Ruang Tersedia</div>
                </div>
                <?php
                }
                else if ($value['status_ruang'] == '1' ){ ?>
                  <div class="card-body status new">
                <div style="color: white; font-size: 17px">Ruang Tidak Tersedia</div>
              </div>
              <?php 
              } 
              ?>
      
                <h4>
                <?php echo $value['nama_ruang'];?></h4>
                <h4><?php echo $value['waktu_sesi'];?></h4>
                <a class="btn btn-primary" style="font-size: 17px; font-family: Arial" href="<?php echo base_url();?>welcome/ruangdetail/<?php echo $value['id_ruang'];?>">Selengkapnya</a>

        </div>
      </div>
      </div>
      
      <?php
      }
    //}
      ?>

    </div>
    <!-- /.iron-card -->
  
  
 <!--Sticky Footer -->
                    
                    </div>
                    <?php $this->load->view("tamu/footer.php") ?>
  <!-- /.content-wrapper -->
           </div> <!-- /#wrapper -->
          
<?php //$this->load->view("tamu/scrolltop.php") ?>
<?php //$this->load->view("tamu/modal.php") ?>
<?php $this->load->view("tamu/loaderpage.php") ?>
<?php $this->load->view("tamu/kalender.php") ?>



</body>
</html>