<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("admin/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">
    <!-- Area Chart Example-->
    <div class="card mb-3">
          <div class="card-header bg-success">
           
            <i class="fas fa-table"></i>
            Data Semua Peminjaman Selesai</div>
         
          <div class="card-body">
            <div class="table-responsive">
            <a class="btn btn-success " href="cetakpeminjaman">Cetak Data <i class="fa fa-print"></i></a><br>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
            <th width="1%">No</th>
            <th width="1%">ID</th>
            <th width="12%">Tanggal Pinjam</th>
            <th width="12%">Tanggal Selesai</th>
            <th width="13%">Nama Kegiatan</th>
            <th width="13%">Nama Peminjam</th>
            <th width="13%">No. Hp</th>
            <th width="13%">E-Mail</th>
            <th width="13%">Ruang</th>
            <th width="15%">Waktu Sesi</th>
          </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($peminjaman as $r){
            ?>
            <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r->id_peminjaman; ?></td>
              <td><?php echo $r->tgl_pinjam; ?></td>
              <td><?php echo $r->tgl_selesai; ?></td>
              <td><?php echo $r->nama_kegiatan; ?></td>
              <td><?php echo $r->name; ?></td>
              <td><?php echo $r->no_hp_peminjam; ?></td>
              <td><?php echo $r->email; ?></td>
              <td><?php echo $r->nama_ruang; ?></td>
              <td><?php echo $r->waktu_sesi; ?></td>
            </tr> 
            <?php 
          }
          ?>
        </tbody> 
            </table>
          </div>
        </div>
      </div>
<hr style="border: 1px solid">

    

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