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


    <!-- Icon Cards-->
    <div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-check-circle"></i>
        </div>
        <div class="mr-5" align="center">JUMLAH BARANG YANG TERSEDIA : <?php $cek = $this->m_barang->barangkosongcard()->num_rows(); 
        //$x=count( $cek['jumlah']);
        echo $cek;?> </div>
        </div>
       
      </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-tags"></i>
        </div>
        <div class="mr-5" align="center">JUMLAH DATA BARANG : <?php echo $this->m_barang->get_data('barang')->num_rows(); ?> </div>
        </div>
       
      </div>
      </div>
    
      <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-users"></i>
        </div>
        <div class="mr-5" align="center">JUMLAH DATA PEMINJAMAN : <?php echo $this->db->query('SELECT * from pinjam_barang where status_pinjam_barang=1')->num_rows(); ?> </div>
        </div>
       
      </div>
      </div>

     <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-th-list"></i>
        </div>
        <div class="mr-5" align="center">JUMLAH DATA SELESAI PINJAM : <?php echo $this->db->query('SELECT * from pinjam_barang where status_pinjam_barang=2')->num_rows(); ?> </div>
        </div>
       
      </div>
      </div>

        <div class="col-xl-12 col-sm-6 mb-3">
      <div class="card text-white bg-secondary o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-clock"></i>
        </div>
        <div class="mr-5" align="center">JUMLAH PENGAJUAN PINJAM : <?php echo $this->m_barang->nungguacc()->num_rows();
         //echo $cek['status_pinjam_barang']; ?> </div>
        </div>
       
      </div>
      </div>

        

    </div>
    <hr style="border: 2px solid">
    
    <div class="card mb-3">
          <div class="card-header bg-">
            <i class="fas fa-table"></i>
            Data Barang Kosong</div>

          <div class="card-body">
            <div class="table-responsive">
              
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
            <th width="1%">No</th>
            <th width="1%">ID Barang</th>
            <th>Kode Barang</th>
            <th>Jenis Barang</th>
            <th>Nama Barang</th>
            <th>Merk</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Foto Barang</th>
          </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($barang as $k ){
            //foreach ($sesi as $key => $value) {
            ?>
            <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $k->id_barang; ?></td>
              <td><?php echo $k->kode_barang; ?></td>
              <td><?php echo $k->jenis_barang; ?></td>
              <td><?php echo $k->nama_barang; ?></td>
              <td><?php echo $k->merk; ?></td>
              <td><?php echo $k->jumlah; ?></td>
              <td><?php echo $k->keterangan; ?></td>
              <td>  <img src="<?php echo base_url();?>./assets/images_barang/<?php echo $k->foto_barang;?>" alt="" style="width:80px; height:80px;">
            </td>
              <!--<td><?php //echo $value->waktu_sesi; ?></td>-->
           </tr>
            <?php 
          //}
        }
          ?>
        </tbody> 
            </table>
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