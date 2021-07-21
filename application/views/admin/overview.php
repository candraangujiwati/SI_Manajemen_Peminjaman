<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">

  <?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">
 <!-- Loading Page -->
 <?php $this->load->view("admin/_partials/loader.php") ?>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("admin/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">


    <!-- Icon Cards-->
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-building"></i>
        </div>
        <div class="mr-5" align="center">JUMLAH DATA RUANG PER SESI : <?php echo $this->m_hotel->get_data('ruang')->num_rows(); ?></div>
        </div>
       
      </div>
      </div>
   
      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-table"></i>
        </div>
        <div class="mr-5" align="center">JUMLAH DATA PEMINJAMAN : <?php echo $this->db->query('SELECT * from peminjaman where status_pinjam=1')->num_rows(); ?> </div>
        </div>
       
      </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-th-list"></i>
        </div>
        <div class="mr-5" align="center">JUMLAH DATA SELESAI PINJAM : <?php echo $this->db->query('SELECT * from peminjaman where status_pinjam=2')->num_rows(); ?> </div>
        </div>
       
      </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-clock"></i>
        </div>
        <div class="mr-5" align="center">JUMLAH PENGAJUAN PINJAM : <?php echo $this->db->query('SELECT * from peminjaman where status_pinjam=0')->num_rows(); ?></div>
        </div>
       
      </div>
      </div>

        

    </div>
    <hr style="border: 2px solid">
    
    <div class="card mb-3">
          <div class="card-header ">
            <i class="fas fa-table"></i>
            Data Ruang Kosong</div>

          <div class="card-body">
            <div class="table-responsive">
              
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
            <th width="1%">No</th>
            <th width="10%">ID Ruang</th>
            <th width="13%">Nama Ruang</th>
            <th width="15%">Kapasitas</th>
            <th width="15%">Area</th>
            <th width="15%">Sesi</th>
          
          </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          
          foreach($ruang as $k ){
            //if($k->status_pinjam=0){
            //foreach ($sesi as $key => $value) {
               //if($k->status_ruang=0 && $value->status_sesi=0){
            ?>
            <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $k->id_ruang; ?></td>
              <td><?php echo $k->nama_ruang; ?></td>
              <td><?php echo $k->kapasitas; ?></td>
              <td><?php echo $k->area; ?></td>
              <td><?php echo $k->waktu_sesi; ?></td>
            
           </tr>
            <?php 
       //}
        
        }
      //}
          ?>
        </tbody> 
            </table>
          </div>
        </div>
      </div>

    

    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("admin/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>