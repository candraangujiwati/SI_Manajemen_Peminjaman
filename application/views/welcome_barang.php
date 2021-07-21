<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">

  <?php $this->load->view("tamu_barang/head.php") ?>

</head>

<body id="page-top">
  <!-- Loading Page -->
 <?php $this->load->view("pengguna_barang/_partials/loader.php") ?>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<?php $this->load->view("tamu_barang/navbar.php") ?>
<div id="wrapper"> 
    <div id="content-wrapper">
    <div class="container-fluid">
    <!--<hr style="border: 4px solid">-->
 <!-- search box-->
 <div class="container-fluid">
          <div class="search-form" ><h4 style="font-family: Arial; font-size: 18px"><span class="fa fa-search" style="font-size: 17px;"></span> Cari Barang :</h4>
            <?php echo form_open('Welcome_barang/cari');?>
          <div class="row">
          <div class="col-lg-12">
          <center>
              <select class="form-control" name="id_barang">
                <option value="id_ruang" style="font-size: 17px">-Pilih Barang-</option>
                <?php
                foreach ($barang->result_array() as $value) {  ?>
                   <option value="<?php echo $value['id_barang']; ?>"><?php echo $value['nama_barang']?> - <?php echo $value['merk']?></option>
                <?php
                }
                ?>
              </select>
              </center>
              </div>
          </div>
        
          <button class="btn btn-primary" style="font-size: 18px; font-family: Arial">Temukan sekarang </button>
<?php echo form_close();?>
        </div>
      <!--end search box-->


    <!-- Icon Cards-->
<div class="row">

    <?php //print_r($ruang->result_array()); exit; 
    foreach ($barang->result_array() as $value) { ?>
       
      <div class="col-xl-3 col-sm-6 mb-3" >

      <div class="properties" style="background-color: white; ">
        <div class="text-black font-weight-bold center">
             <img src="<?php echo base_url();?>/assets/images_barang/<?php echo $value['foto_barang'];?>" class="img-responsive" alt="properties" style="width:278.5px;height:150px;">
            <?php
                if ($value['jumlah'] >'0' ) { ?>
                  <div class="card-body status sold">
                <div style="color: white; font-size: 16px"> Barang Tersedia</div>
                </div>
                <?php
                }
                else if($value['jumlah'] == 0) { ?>
                  <div class="card-body status new">
                <div style="color: white; font-size: 16px">Barang Kosong</div>
              </div>
              <?php 
              }
              ?>
                <h4 style="font-family: Arial"><?php echo $value['nama_barang'];?></h4>
                <h4 style="font-family: Arial">Merk : <?php echo $value['merk'];?></h4>
                <h4 style="font-family: Arial">Jumlah Barang : <?php echo $value['jumlah'];?></h4>
                <a class="btn btn-primary" style="font-size: 17px; font-family: Arial" href="<?php echo base_url();?>welcome_barang/barangdetail/<?php echo $value['id_barang'];?>">Selengkapnya</a>
            </div>
      </div>
      </div>
      <?php
     }
      ?>
     
</div>
<hr style="border: 4px solid">
    <div class="row">
          <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header "align="center" style="font-size: 20px">
                <i class="fas fa-chart-bar" ></i>
               Statistik Peminjaman Barang</div>
              <div class="card-body">
              <canvas id="myChart" width="100%" height="50"></canvas>
                <?php 
                $nama_barang= "";
                $jumlah_pinjam='';
        foreach ($barangchart as $item)
        {
          $nb=$item->nama_barang;
          $nama_barang .= "'$nb'". ", ";
          $jum=$item->jumlah_pinjam;
          $jumlah_pinjam .= "'$jum'". ", ";
        }
       //echo $nama_barang;
       //echo $jum
        ?>
        <?php //$this->load->view("tamu_barang/bar.php") ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.0/chart.js"></script>
<script>
   var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $nama_barang; ?>],
            datasets: [{
                label:'Data Jumlah Barang Yang Dipinjam',
                backgroundColor: ['rgb(30, 144, 255)', 'rgba(34, 139, 34 )'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlah_pinjam; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

        </script>
              </div>
              <div class="card-footer small text-muted">Updated <? echo date('D, d-M-Y');?> </div>
            </div>
          </div>
</div>
  
    <!-- /.iron-card -->
    </div>
    </div>
 <!--Sticky Footer -->
                    </div>
                    <?php $this->load->view("tamu_barang/footer.php") ?>
  <!-- /.content-wrapper -->
           </div> <!-- /#wrapper -->
           <?php //$this->load->view("tamu_barang/chart.php") ?>
<?php $this->load->view("tamu_barang/scrolltop.php") ?>
<?php $this->load->view("tamu_barang/modal.php") ?>
<?php $this->load->view("tamu_barang/js.php") ?>
<?php //$this->load->view("tamu_barang/loaderpage.php") ?>
 





</body>
</html>